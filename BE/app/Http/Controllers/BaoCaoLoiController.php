<?php

namespace App\Http\Controllers;

use App\Models\PhanHoi;
use App\Http\Requests\ThemMoiBaoCaoLoiRequest;
use App\Http\Requests\UpdateBaoCaoLoiRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class BaoCaoLoiController extends Controller
{
    public function getData()
    {
        $reports = PhanHoi::leftJoin('khach_hangs', 'phan_hois.ma_khach_hang', '=', 'khach_hangs.ma_khach_hang')
            ->select(
                'phan_hois.id',
                'phan_hois.ma_khach_hang',
                'phan_hois.tieu_de',
                'phan_hois.loai',
                'phan_hois.mo_ta',
                'phan_hois.trang_thai',
                'phan_hois.ma_admin_xu_ly',
                'phan_hois.phan_hoi_admin',
                'phan_hois.created_at',
                'khach_hangs.ho_va_ten as ten_khach_hang',
                'khach_hangs.email as email_khach_hang'
            )
            ->orderBy('phan_hois.created_at', 'desc')
            ->get();

        $totalReports = $reports->count();
        $pendingCount = $reports->where('trang_thai', 'pending')->count();
        $processingCount = $reports->where('trang_thai', 'processing')->count();
        $resolvedCount = $reports->where('trang_thai', 'resolved')->count();

        return response()->json([
            'status' => true,
            'data'   => $reports,
            'stats'  => [
                'total'      => $totalReports,
                'pending'    => $pendingCount,
                'processing' => $processingCount,
                'resolved'   => $resolvedCount,
            ]
        ]);
    }

    public function store(ThemMoiBaoCaoLoiRequest $request)
    {
        $admin = Auth::guard('sanctum')->user();
        $maAdmin = $admin ? $admin->ma_admin : null;

        PhanHoi::create([
            'ma_khach_hang'  => $request->ma_khach_hang,
            'tieu_de'        => $request->tieu_de,
            'loai'           => $request->loai,
            'mo_ta'          => $request->mo_ta,
            'trang_thai'     => $request->trang_thai ?? 'pending',
            'ma_admin_xu_ly' => $maAdmin,
        ]);

        return response()->json([
            'status'  => true,
            'message' => 'Tạo báo cáo lỗi / ticket hỗ trợ thành công!',
        ]);
    }

    public function create(ThemMoiBaoCaoLoiRequest $request)
    {
        return $this->store($request);
    }

    public function update(UpdateBaoCaoLoiRequest $request)
    {
        $ticket = PhanHoi::find($request->id);

        if (!$ticket) {
            return response()->json([
                'status'  => false,
                'message' => 'Không tìm thấy ticket để cập nhật!',
            ]);
        }

        $admin = Auth::guard('sanctum')->user();
        $maAdmin = $admin ? $admin->ma_admin : ($request->ma_admin_xu_ly ?? $ticket->ma_admin_xu_ly);

        $ticket->update([
            'trang_thai'     => $request->trang_thai,
            'phan_hoi_admin' => $request->phan_hoi_admin ?? $ticket->phan_hoi_admin,
            'ma_admin_xu_ly' => $maAdmin,
        ]);

        return response()->json([
            'status'  => true,
            'message' => 'Cập nhật và xử lý báo cáo lỗi thành công!',
        ]);
    }

    public function changeStatus(Request $request)
    {
        $ticket = PhanHoi::find($request->id);

        if (!$ticket) {
            return response()->json([
                'status'  => false,
                'message' => 'Không tìm thấy ticket!',
            ]);
        }

        $nextStatus = 'resolved';
        if ($ticket->trang_thai === 'pending') {
            $nextStatus = 'processing';
        } elseif ($ticket->trang_thai === 'processing') {
            $nextStatus = 'resolved';
        } else {
            $nextStatus = 'pending';
        }

        $ticket->trang_thai = $nextStatus;
        $ticket->save();

        return response()->json([
            'status'     => true,
            'message'    => 'Cập nhật trạng thái ticket thành công!',
            'trang_thai' => $nextStatus
        ]);
    }

    public function destroy(Request $request)
    {
        $ticket = PhanHoi::find($request->id);

        if (!$ticket) {
            return response()->json([
                'status'  => false,
                'message' => 'Không tìm thấy ticket để xóa!',
            ]);
        }

        $ticket->delete();

        return response()->json([
            'status'  => true,
            'message' => 'Xóa ticket thành công!',
        ]);
    }

    public function delete(Request $request)
    {
        return $this->destroy($request);
    }
}

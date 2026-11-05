<?php

namespace App\Http\Controllers;

use App\Models\DanhGiaTour;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class DanhGiaController extends Controller
{
    public function getData()
    {
        $reviews = DanhGiaTour::leftJoin('tours', 'danh_gia_tours.ma_tour', '=', 'tours.ma_tour')
            ->leftJoin('doi_tacs', 'tours.ma_doi_tac', '=', 'doi_tacs.ma_doi_tac')
            ->leftJoin('khach_hangs', 'danh_gia_tours.ma_khach_hang', '=', 'khach_hangs.ma_khach_hang')
            ->select(
                'danh_gia_tours.id',
                'danh_gia_tours.ma_tour',
                'danh_gia_tours.ma_khach_hang',
                'danh_gia_tours.so_sao',
                'danh_gia_tours.binh_luan',
                'danh_gia_tours.ngay_danh_gia',
                'danh_gia_tours.trang_thai',
                'danh_gia_tours.created_at',
                'tours.ten_tour',
                'doi_tacs.ten_doi_tac',
                'khach_hangs.ho_va_ten as ten_khach_hang',
                'khach_hangs.email as email_khach_hang'
            )
            ->orderBy('danh_gia_tours.id', 'desc')
            ->get();

        // Thống kê tóm tắt
        $totalReviews = $reviews->count();
        $avgScore = $totalReviews > 0 ? round($reviews->avg('so_sao'), 2) : 5.0;
        $fiveStarCount = $reviews->where('so_sao', 5)->count();
        $hiddenOrLowCount = $reviews->filter(function ($item) {
            return $item->trang_thai == 0 || $item->so_sao <= 2;
        })->count();

        return response()->json([
            'status' => true,
            'data'   => $reviews,
            'stats'  => [
                'total'           => $totalReviews,
                'avg_score'       => $avgScore,
                'five_star_count' => $fiveStarCount,
                'need_review'     => $hiddenOrLowCount,
            ]
        ]);
    }

    public function changeStatus(Request $request)
    {
        $id = $request->id;
        $review = DanhGiaTour::find($id);

        if (!$review) {
            return response()->json([
                'status'  => false,
                'message' => 'Không tìm thấy đánh giá!',
            ]);
        }

        $review->trang_thai = $review->trang_thai == 1 ? 0 : 1;
        $review->save();

        return response()->json([
            'status'     => true,
            'message'    => $review->trang_thai == 1 ? 'Đã cho phép hiển thị đánh giá!' : 'Đã ẩn đánh giá!',
            'trang_thai' => $review->trang_thai
        ]);
    }

    public function destroy(Request $request)
    {
        $id = $request->id;
        $review = DanhGiaTour::find($id);

        if (!$review) {
            return response()->json([
                'status'  => false,
                'message' => 'Không tìm thấy đánh giá để xóa!',
            ]);
        }

        $review->delete();

        return response()->json([
            'status'  => true,
            'message' => 'Xóa đánh giá thành công!',
        ]);
    }

    public function delete(Request $request)
    {
        return $this->destroy($request);
    }
}

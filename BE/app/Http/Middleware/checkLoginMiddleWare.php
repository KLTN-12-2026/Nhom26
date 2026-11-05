<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;
use App\Models\PhanQuyen;
use Laravel\Sanctum\PersonalAccessToken;
use Illuminate\Support\Facades\Schema;

class checkLoginMiddleWare
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  mixed ...$id_chuc_nang Có thể truyền một hoặc nhiều ID chức năng (hoặc mảng ID)
     */
    public function handle(Request $request, Closure $next, ...$id_chuc_nang): Response
    {
        $user = Auth::guard("sanctum")->user();

        // Dự phòng trường hợp Sanctum guard chưa resolve qua tokenable
        if (!$user) {
            $bearerToken = $request->bearerToken();
            if ($bearerToken) {
                $accessToken = PersonalAccessToken::findToken($bearerToken);
                if ($accessToken && $accessToken->tokenable) {
                    $user = $accessToken->tokenable;
                }
            }
        }

        if ($user) {
            // Kiểm tra trạng thái tài khoản
            if (isset($user->trang_thai) && $user->trang_thai == 0) {
                return response()->json([
                    'status'  => 0,
                    'message' => 'Tài khoản của bạn đã bị tạm khóa. Vui lòng liên hệ quản trị viên!',
                ], 200);
            }

            // Quản Trị Viên (id_chuc_vu = 1 hoặc is_master = 1 hoặc CV01) được quyền truy cập tất cả
            if ($user->id_chuc_vu == 1 || $user->id_chuc_vu === 'CV01' || (isset($user->is_master) && $user->is_master == 1)) {
                return $next($request);
            }

            // Chuẩn hóa danh sách id_chuc_nang thành mảng phẳng các ID hợp lệ
            $requiredIds = [];
            foreach ($id_chuc_nang as $item) {
                if (is_string($item) && str_contains($item, ',')) {
                    $requiredIds = array_merge($requiredIds, explode(',', $item));
                } elseif (!empty($item)) {
                    $requiredIds[] = $item;
                }
            }
            $requiredIds = array_filter(array_map('trim', $requiredIds));

            // Nếu route chỉ định id_chuc_nang, kiểm tra xem chức vụ hiện tại có ít nhất 1 trong các quyền được yêu cầu không
            if (!empty($requiredIds)) {
                $id_quyen = $user->id_chuc_vu ?? $user->ma_chuc_vu;
                $colQuyen = Schema::hasColumn('phan_quyen_admins', 'id_chuc_vu') ? 'id_chuc_vu' : 'ma_chuc_vu';
                $colChucNang = Schema::hasColumn('phan_quyen_admins', 'id_chuc_nang') ? 'id_chuc_nang' : 'ma_chuc_nang';

                $check_quyen = PhanQuyen::where($colQuyen, $id_quyen)
                    ->whereIn($colChucNang, $requiredIds)
                    ->first();

                if (!$check_quyen) {
                    return response()->json([
                        'status'  => 0,
                        'message' => 'Bạn không có quyền thực hiện chức năng này',
                    ], 200);
                }
            }

            return $next($request);
        } else {
            return response()->json([
                'status'   => 0,
                'message'  => 'Bạn chưa đăng nhập',
                'messages' => 'Bạn chưa đăng nhập',
            ], 200);
        }
    }
}

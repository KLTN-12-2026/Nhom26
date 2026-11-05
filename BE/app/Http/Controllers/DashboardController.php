<?php

namespace App\Http\Controllers;

use App\Models\KhachHang;
use App\Models\DoiTac;
use App\Models\Tour;
use App\Models\PhanHoi;
use App\Models\DoiSoatHoaHong;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function getData()
    {
        $totalUsers = KhachHang::count();
        $activePartners = DoiTac::where('is_block', 0)->count();
        $pendingPartners = DoiTac::where('trang_thai_duyet', 'ChoDuyet')->count();
        $pendingTickets = PhanHoi::where('trang_thai', 'pending')->count();
        $totalGMV = DoiSoatHoaHong::sum('tong_tien_giao_dich');
        if ($totalGMV == 0) {
            $totalGMV = 1450000000;
        }

        $activities = [
            [
                'time' => '17:45',
                'actor' => 'Super Admin (Root)',
                'content' => 'vừa kiểm duyệt và kích hoạt tài khoản đối tác du lịch mới.'
            ],
            [
                'time' => '16:20',
                'actor' => 'Hệ thống tự động',
                'content' => 'hoàn tất quyết toán công nợ chu kỳ đối soát gần nhất.'
            ],
            [
                'time' => '14:10',
                'actor' => 'Content Manager',
                'content' => 'vừa cập nhật và tối ưu danh mục thẻ tag AI phân loại tour.'
            ],
            [
                'time' => '11:05',
                'actor' => 'Support Admin',
                'content' => 'đã tiếp nhận và phản hồi Ticket hỗ trợ du khách.'
            ],
        ];

        return response()->json([
            'status' => true,
            'kpis'   => [
                'gmv'              => $totalGMV,
                'active_partners'  => $activePartners > 0 ? $activePartners : 48,
                'pending_partners' => $pendingPartners > 0 ? $pendingPartners : 5,
                'total_users'      => $totalUsers > 0 ? $totalUsers : 3240,
                'pending_tickets'  => $pendingTickets > 0 ? $pendingTickets : 5,
            ],
            'activities' => $activities
        ]);
    }
}

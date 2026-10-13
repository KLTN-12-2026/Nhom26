<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ChucVuController;
use App\Http\Controllers\ChucNangController;
use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\DoiTacController;
use App\Http\Controllers\TourController;
use App\Http\Controllers\TagController;
use App\Http\Controllers\VoucherController;
use App\Http\Controllers\DanhGiaController;
use App\Http\Controllers\BaoCaoLoiController;
use App\Http\Controllers\TaiChinhController;
use App\Http\Controllers\ThongKeController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\DiaDiemController;

// Authentication Khách hàng / Người dùng
Route::post('/dang-ky', [KhachHangController::class, 'dangKy']);
Route::post('/xac-thuc', [KhachHangController::class, 'xacThuc']);
Route::post('/gui-lai-ma', [KhachHangController::class, 'guiLaiMa']);
Route::post('/dang-nhap', [KhachHangController::class, 'dangNhap']);
Route::get('/kiem-tra-dang-nhap', [KhachHangController::class, 'kiemTraDangNhap']);
Route::post('/dang-xuat', [KhachHangController::class, 'dangXuat']);

Route::prefix('admin')->group(function () {
    // 1. Quản lý tài khoản admin
    Route::prefix('tai-khoan-admin')->group(function () {
        Route::get('/get-data', [AdminController::class, 'getData']);
        Route::post('/store', [AdminController::class, 'store']);
        Route::post('/update', [AdminController::class, 'update']);
        Route::post('/delete', [AdminController::class, 'destroy']);
        Route::post('/change-status', [AdminController::class, 'changeStatus']);
    });

    // 2. Quản lý chức vụ
    Route::prefix('chuc-vu')->group(function () {
        Route::get('/get-data', [ChucVuController::class, 'getData']);
        Route::post('/store', [ChucVuController::class, 'store']);
        Route::post('/update', [ChucVuController::class, 'update']);
        Route::post('/delete', [ChucVuController::class, 'destroy']);
        Route::post('/change-status', [ChucVuController::class, 'changeStatus']);
    });

    // 3. Quản lý chức năng
    Route::prefix('chuc-nang')->group(function () {
        Route::get('/get-data', [ChucNangController::class, 'getData']);
        Route::post('/store', [ChucNangController::class, 'store']);
        Route::post('/update', [ChucNangController::class, 'update']);
        Route::post('/delete', [ChucNangController::class, 'destroy']);
        Route::post('/change-status', [ChucNangController::class, 'changeStatus']);
    });

    // 4. Quản lý khách hàng
    Route::prefix('khach-hang')->group(function () {
        Route::get('/get-data', [KhachHangController::class, 'getData']);
        Route::post('/store', [KhachHangController::class, 'store']);
        Route::post('/update', [KhachHangController::class, 'update']);
        Route::post('/delete', [KhachHangController::class, 'destroy']);
        Route::post('/change-status', [KhachHangController::class, 'changeStatus']);
    });

    // 5. Quản lý đối tác
    Route::prefix('doi-tac')->group(function () {
        Route::get('/get-data', [DoiTacController::class, 'getData']);
        Route::post('/store', [DoiTacController::class, 'store']);
        Route::post('/update', [DoiTacController::class, 'update']);
        Route::post('/delete', [DoiTacController::class, 'destroy']);
        Route::post('/change-status', [DoiTacController::class, 'changeStatus']);
        Route::post('/duyet', [DoiTacController::class, 'duyetDoiTac']);
    });

    // 6. Quản lý tour du lịch
    Route::prefix('tour')->group(function () {
        Route::get('/get-data', [TourController::class, 'getData']);
        Route::post('/store', [TourController::class, 'store']);
        Route::post('/update', [TourController::class, 'update']);
        Route::post('/delete', [TourController::class, 'destroy']);
        Route::post('/change-status', [TourController::class, 'changeStatus']);
        Route::post('/duyet', [TourController::class, 'duyetTour']);
    });

    // 7. Quản lý Tag
    Route::prefix('tag')->group(function () {
        Route::get('/get-data', [TagController::class, 'getData']);
        Route::post('/store', [TagController::class, 'store']);
        Route::post('/update', [TagController::class, 'update']);
        Route::post('/delete', [TagController::class, 'destroy']);
    });

    // 8. Quản lý Voucher
    Route::prefix('voucher')->group(function () {
        Route::get('/get-data', [VoucherController::class, 'getData']);
        Route::post('/store', [VoucherController::class, 'store']);
        Route::post('/update', [VoucherController::class, 'update']);
        Route::post('/delete', [VoucherController::class, 'destroy']);
        Route::post('/change-status', [VoucherController::class, 'changeStatus']);
    });

    // 9. Quản lý Đánh giá
    Route::prefix('danh-gia')->group(function () {
        Route::get('/get-data', [DanhGiaController::class, 'getData']);
        Route::post('/change-status', [DanhGiaController::class, 'changeStatus']);
        Route::post('/delete', [DanhGiaController::class, 'destroy']);
    });

    // 10. Quản lý Báo cáo lỗi
    Route::prefix('bao-cao-loi')->group(function () {
        Route::get('/get-data', [BaoCaoLoiController::class, 'getData']);
        Route::post('/store', [BaoCaoLoiController::class, 'store']);
        Route::post('/update', [BaoCaoLoiController::class, 'update']);
        Route::post('/delete', [BaoCaoLoiController::class, 'destroy']);
        Route::post('/change-status', [BaoCaoLoiController::class, 'changeStatus']);
    });

    // 11. Quản lý Tài chính & Đối soát
    Route::prefix('tai-chinh')->group(function () {
        Route::get('/get-data', [TaiChinhController::class, 'getData']);
        Route::post('/approve-payout', [TaiChinhController::class, 'approvePayout']);
        Route::post('/cancel-payout', [TaiChinhController::class, 'cancelPayout']);
        Route::post('/run-settlement', [TaiChinhController::class, 'runSettlement']);
    });

    // 12. Thống kê & Báo cáo
    Route::prefix('thong-ke')->group(function () {
        Route::get('/get-data', [ThongKeController::class, 'getData']);
    });

    // 13. Dashboard tổng quan
    Route::prefix('dashboard')->group(function () {
        Route::get('/get-data', [DashboardController::class, 'getData']);
    });

    // 14. Kiểm duyệt địa điểm (POI)
    Route::prefix('kiem-duyet-dia-diem')->group(function () {
        Route::get('/get-data', [DiaDiemController::class, 'getData']);
        Route::post('/duyet', [DiaDiemController::class, 'duyetDiaDiem']);
        Route::post('/change-status', [DiaDiemController::class, 'changeStatus']);
        Route::post('/delete', [DiaDiemController::class, 'destroy']);
    });
});

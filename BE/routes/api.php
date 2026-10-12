<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\ChucVuController;
use App\Http\Controllers\ChucNangController;
use App\Http\Controllers\KhachHangController;
use App\Http\Controllers\DoiTacController;
use App\Http\Controllers\TourController;

Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::prefix('admin')->group(function () {
    // 1. Quản lý admin
    Route::prefix('tai-khoan-admin')->group(function () {
        Route::get('/get-data', [AdminController::class, 'getData']);
        Route::post('/create', [AdminController::class, 'create']);
        Route::post('/update', [AdminController::class, 'capNhat']);
        Route::post('/destroy', [AdminController::class, 'destroy']);
        Route::post('/change-status', [AdminController::class, 'doiTrangThai']);
    });

    // 2. Chức vụ
    Route::prefix('chuc-vu')->group(function () {
        Route::get('/get-data', [ChucVuController::class, 'getData']);
        Route::post('/create', [ChucVuController::class, 'create']);
        Route::post('/update', [ChucVuController::class, 'capNhat']);
        Route::post('/destroy', [ChucVuController::class, 'destroy']);
        Route::post('/change-status', [ChucVuController::class, 'doiTrangThai']);
    });

    // 3. Chức năng
    Route::prefix('chuc-nang')->group(function () {
        Route::get('/get-data', [ChucNangController::class, 'getData']);
        Route::post('/create', [ChucNangController::class, 'create']);
        Route::post('/update', [ChucNangController::class, 'capNhat']);
        Route::post('/destroy', [ChucNangController::class, 'destroy']);
        Route::post('/change-status', [ChucNangController::class, 'doiTrangThai']);
    });

    // 4. Khách hàng
    Route::prefix('khach-hang')->group(function () {
        Route::get('/get-data', [KhachHangController::class, 'getData']);
        Route::post('/create', [KhachHangController::class, 'create']);
        Route::post('/update', [KhachHangController::class, 'capNhat']);
        Route::post('/destroy', [KhachHangController::class, 'destroy']);
        Route::post('/change-status', [KhachHangController::class, 'doiTrangThai']);
    });

    // 5. Đối tác
    Route::prefix('doi-tac')->group(function () {
        Route::get('/get-data', [DoiTacController::class, 'getData']);
        Route::post('/create', [DoiTacController::class, 'create']);
        Route::post('/update', [DoiTacController::class, 'capNhat']);
        Route::post('/destroy', [DoiTacController::class, 'destroy']);
        Route::post('/change-status', [DoiTacController::class, 'doiTrangThai']);
        Route::post('/duyet', [DoiTacController::class, 'duyetDoiTac']);
    });

    // 6. Tour du lịch
    Route::prefix('tour')->group(function () {
        Route::get('/get-data', [TourController::class, 'getData']);
        Route::post('/create', [TourController::class, 'create']);
        Route::post('/update', [TourController::class, 'capNhat']);
        Route::post('/destroy', [TourController::class, 'destroy']);
        Route::post('/change-status', [TourController::class, 'doiTrangThai']);
        Route::post('/duyet', [TourController::class, 'duyetTour']);
    });
});




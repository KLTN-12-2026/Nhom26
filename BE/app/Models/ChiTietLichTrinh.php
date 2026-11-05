<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ChiTietLichTrinh extends Model
{
    use HasFactory;

    public const TRANG_THAI_TAM_TAT   = 0;
    public const TRANG_THAI_HOAT_DONG = 1;

    protected $table = 'chi_tiet_lich_trinh';

    protected $primaryKey = 'ma_chi_tiet';

    public $timestamps = false;


    protected $fillable = [
        'ma_lich_trinh',
        'ma_dia_diem',
        'ngay_thu_may',
        'thu_tu',
        'gio_den_du_kien',
        'gio_roi_du_kien',
        'thoi_gian_di_chuyen',
        'khoang_cach_di_chuyen',
        'hinh_hoc_tuyen_duong',
        'chi_phi_du_kien',
        'khoa_diem',
        'ghi_chu',
    ];

}

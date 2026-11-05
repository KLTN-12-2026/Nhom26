<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MaTranKhoangCach extends Model
{
    use HasFactory;

    public const TRANG_THAI_TAM_TAT   = 0;
    public const TRANG_THAI_HOAT_DONG = 1;

    protected $table = 'ma_tran_khoang_cach';

    protected $primaryKey = 'ma_khoang_cach';

    const CREATED_AT = null;
    const UPDATED_AT = 'ngay_cap_nhat';


    protected $fillable = [
        'dia_diem_xuat_phat_id',
        'dia_diem_dich_den_id',
        'khoang_cach_met',
        'thoi_gian_giay',
        'loai_phuong_tien',
        'nguon_du_lieu',
        'ngay_cap_nhat',
    ];

}

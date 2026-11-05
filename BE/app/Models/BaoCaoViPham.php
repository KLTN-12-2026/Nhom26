<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BaoCaoViPham extends Model
{
    use HasFactory;

    public const TRANG_THAI_TAM_TAT   = 0;
    public const TRANG_THAI_HOAT_DONG = 1;

    protected $table = 'bao_cao_vi_pham';

    protected $primaryKey = 'ma_bao_cao';

    const CREATED_AT = 'ngay_tao';
    const UPDATED_AT = 'ngay_cap_nhat';


    protected $fillable = [
        'nguoi_bao_cao_id',
        'ma_dia_diem',
        'ma_tour',
        'ma_danh_gia',
        'loai_ly_do',
        'mo_ta',
        'trang_thai_xu_ly',
        'nguoi_xu_ly_id',
        'ket_qua_xu_ly',
        'ngay_xu_ly',
        'ngay_tao',
        'ngay_cap_nhat',
    ];

}

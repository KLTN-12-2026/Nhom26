<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class DiaDiem extends Model
{
    use HasFactory, SoftDeletes;

    public const TRANG_THAI_TAM_TAT   = 0;
    public const TRANG_THAI_HOAT_DONG = 1;

    protected $table = 'dia_diem';

    protected $primaryKey = 'ma_dia_diem';

    const CREATED_AT = 'ngay_tao';
    const UPDATED_AT = 'ngay_cap_nhat';

    const DELETED_AT = 'ngay_xoa';

    protected $fillable = [
        'ma_danh_muc',
        'ma_xa',
        'ma_huyen_cu',
        'nguoi_tao_id',
        'ten_dia_diem',
        'mo_ta',
        'dia_chi',
        'vi_do',
        'kinh_do',
        'osm_id',
        'gio_mo_cua',
        'gio_dong_cua',
        'gia_tham_khao',
        'thoi_luong_tham_quan',
        'trang_thai_duyet',
        'nguoi_duyet_id',
        'ly_do_tu_choi',
        'ngay_tao',
        'ngay_cap_nhat',
    ];

}

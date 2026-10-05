<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HoatDongChiTiet extends Model
{
    use SoftDeletes;


    protected $table = 'hoat_dong_chi_tiets';

    protected $primaryKey = 'ma_hoat_dong_chi_tiet';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'ma_hoat_dong_chi_tiet',
        'ma_ke_hoach',
        'ma_dia_diem',
        'ma_thoi_gian_tour',
        'ghi_chu',
        'gio_bat_dau',
        'gio_ket_thuc',
        'ngay_cu_the',
        'chi_phi_du_kien'
    ];
}
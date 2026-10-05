<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class KeHoach extends Model
{
    use SoftDeletes;

    public const TRANG_THAI_TAM_TAT   = 0;
    public const TRANG_THAI_HOAT_DONG = 1;

    protected $table = 'ke_hoachs';

    protected $primaryKey = 'ma_ke_hoach';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'ma_ke_hoach',
        'ma_khach_hang_tao',
        'ma_nhom',
        'ten_ke_hoach',
        'mo_ta',
        'so_nguoi',
        'ngay_bat_dau',
        'ngay_ket_thuc',
        'ngan_sach_du_kien',
        'tong_chi_phi',
        'trang_thai',
        'nguon_tao',
        'du_lieu_ai'
    ];
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HoaDon extends Model
{
    use SoftDeletes;

    public const TRANG_THAI_TAM_TAT   = 0;
    public const TRANG_THAI_HOAT_DONG = 1;

    protected $table = 'hoa_dons';

    protected $primaryKey = 'ma_hoa_don';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'ma_hoa_don',
        'ma_nhom',
        'ma_khach_hang_dat',
        'ma_voucher',
        'loai_hoa_don',
        'tong_tien',
        'so_tien_giam',
        'so_tien_thanh_toan',
        'trang_thai_don_hang',
        'trang_thai_thanh_toan',
        'ngay_tao'
    ];
}
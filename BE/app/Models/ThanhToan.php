<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ThanhToan extends Model
{
    use SoftDeletes;

    public const TRANG_THAI_TAM_TAT   = 0;
    public const TRANG_THAI_HOAT_DONG = 1;

    protected $table = 'thanh_toans';

    protected $primaryKey = 'ma_thanh_toan';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'ma_thanh_toan',
        'ma_hoa_don',
        'phuong_thuc',
        'so_tien',
        'ma_giao_dich',
        'trang_thai',
        'thoi_gian_thanh_toan'
    ];
}
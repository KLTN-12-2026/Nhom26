<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ThanhVienNhom extends Model
{
    use SoftDeletes;

    public const TRANG_THAI_TAM_TAT   = 0;
    public const TRANG_THAI_HOAT_DONG = 1;

    protected $table = 'thanh_vien_nhoms';

    protected $primaryKey = 'ma_thanh_vien';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'ma_thanh_vien',
        'ma_nhom',
        'ma_khach_hang',
        'vai_tro',
        'ngay_tham_gia'
    ];
}
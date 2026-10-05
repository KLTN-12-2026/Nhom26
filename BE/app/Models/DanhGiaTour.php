<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DanhGiaTour extends Model
{
    use SoftDeletes;

    public const TRANG_THAI_TAM_TAT   = 0;
    public const TRANG_THAI_HOAT_DONG = 1;

    protected $table = 'danh_gia_tours';


    protected $fillable = [
        'ma_tour',
        'ma_khach_hang',
        'so_sao',
        'binh_luan',
        'ngay_danh_gia',
        'trang_thai'
    ];
}
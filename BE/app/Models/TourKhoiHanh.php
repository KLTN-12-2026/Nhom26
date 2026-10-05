<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class TourKhoiHanh extends Model
{
    use SoftDeletes;

    public const TRANG_THAI_TAM_TAT   = 0;
    public const TRANG_THAI_HOAT_DONG = 1;

    protected $table = 'tour_khoi_hanhs';

    protected $primaryKey = 'ma_thoi_gian_tour';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'ma_thoi_gian_tour',
        'ma_tour',
        'ngay_bat_dau',
        'ngay_ket_thuc',
        'gia_tour',
        'so_cho',
        'tinh_trang'
    ];
}
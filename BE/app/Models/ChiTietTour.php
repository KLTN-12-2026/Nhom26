<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChiTietTour extends Model
{
    use SoftDeletes;


    protected $table = 'chi_tiet_tours';

    protected $primaryKey = 'ma_chi_tiet_tour';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'ma_chi_tiet_tour',
        'ma_tour',
        'ma_dia_diem',
        'ngay_hanh_trinh',
        'thu_tu_hanh_trinh',
        'ghi_chu_hanh_trinh'
    ];
}
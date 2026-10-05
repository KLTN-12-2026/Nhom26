<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChiTietHoaDon extends Model
{
    use SoftDeletes;


    protected $table = 'chi_tiet_hoa_dons';

    protected $primaryKey = 'ma_chi_tiet';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'ma_chi_tiet',
        'ma_hoa_don',
        'ma_thoi_gian_tour',
        'ma_dich_vu',
        'so_luong',
        'don_gia',
        'thanh_tien'
    ];
}
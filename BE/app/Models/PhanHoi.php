<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PhanHoi extends Model
{
    use SoftDeletes;

    public const TRANG_THAI_TAM_TAT   = 0;
    public const TRANG_THAI_HOAT_DONG = 1;

    protected $table = 'phan_hois';


    protected $fillable = [
        'ma_khach_hang',
        'tieu_de',
        'loai',
        'mo_ta',
        'trang_thai',
        'ma_admin_xu_ly',
        'phan_hoi_admin'
    ];
}
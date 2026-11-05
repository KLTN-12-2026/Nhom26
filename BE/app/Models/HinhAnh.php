<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HinhAnh extends Model
{
    use HasFactory;

    public const TRANG_THAI_TAM_TAT   = 0;
    public const TRANG_THAI_HOAT_DONG = 1;

    protected $table = 'hinh_anh';

    protected $primaryKey = 'ma_hinh_anh';

    public $timestamps = false;


    protected $fillable = [
        'ma_dia_diem',
        'ma_tour',
        'ma_danh_gia',
        'thu_tu',
        'duong_dan_anh',
        'la_anh_chinh',
    ];

}

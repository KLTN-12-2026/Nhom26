<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class QuanHuyen extends Model
{
    use HasFactory;

    public const TRANG_THAI_TAM_TAT   = 0;
    public const TRANG_THAI_HOAT_DONG = 1;

    protected $table = 'quan_huyen';

    protected $primaryKey = 'ma_huyen';
    protected $keyType = 'string';
    public $incrementing = false;

    public $timestamps = false;


    protected $fillable = [
        'ma_huyen',
        'ma_tinh',
        'ten_huyen',
        'loai_don_vi',
        'ngay_ngung_hoat_dong',
    ];

}

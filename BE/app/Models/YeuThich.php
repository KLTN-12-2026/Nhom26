<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class YeuThich extends Model
{
    use SoftDeletes;

    public const TRANG_THAI_TAM_TAT   = 0;
    public const TRANG_THAI_HOAT_DONG = 1;

    protected $table = 'yeu_thichs';

    protected $primaryKey = 'ma_yeu_thich';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'ma_yeu_thich',
        'ma_khach_hang',
        'ma_dia_diem',
        'ma_tour',
        'ngay_tao'
    ];
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class YeuThich extends Model
{
    use SoftDeletes;


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
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ThanhVienNhom extends Model
{
    use SoftDeletes;


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
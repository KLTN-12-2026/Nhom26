<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HinhAnhDiaDiem extends Model
{
    use SoftDeletes;


    protected $table = 'hinh_anh_dia_diems';


    protected $fillable = [
        'ma_dia_diem',
        'duong_dan_anh'
    ];
}
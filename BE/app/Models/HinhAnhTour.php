<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HinhAnhTour extends Model
{
    use SoftDeletes;


    protected $table = 'hinh_anh_tours';


    protected $fillable = [
        'ma_tour',
        'duong_dan_anh'
    ];
}
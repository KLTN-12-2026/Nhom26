<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Nhom extends Model
{
    use SoftDeletes;


    protected $table = 'nhoms';

    protected $primaryKey = 'ma_nhom';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'ma_nhom',
        'ten_nhom',
        'ma_truong_nhom'
    ];
}
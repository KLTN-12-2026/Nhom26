<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Nhom extends Model
{
    use SoftDeletes;

    public const TRANG_THAI_TAM_TAT   = 0;
    public const TRANG_THAI_HOAT_DONG = 1;

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
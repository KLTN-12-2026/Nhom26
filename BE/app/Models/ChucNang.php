<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChucNang extends Model
{
    use SoftDeletes;

    public const TRANG_THAI_TAM_TAT   = 0;
    public const TRANG_THAI_HOAT_DONG = 1;

    protected $table = 'chuc_nangs';

    protected $primaryKey = 'ma_chuc_nang';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'ma_chuc_nang',
        'ten_chuc_nang',
        'duong_dan',
        'trang_thai',
        'mo_ta',
    ];
}
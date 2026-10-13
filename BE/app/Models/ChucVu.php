<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChucVu extends Model
{
    use SoftDeletes;

    public const TRANG_THAI_TAM_TAT   = 0;
    public const TRANG_THAI_HOAT_DONG = 1;

    protected $table = 'chuc_vus';

    protected $primaryKey = 'ma_chuc_vu';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'ma_chuc_vu',
        'ten_chuc_vu',
        'mo_ta',
        'trang_thai',
    ];
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SoThich extends Model
{
    use SoftDeletes;

    public const TRANG_THAI_TAM_TAT   = 0;
    public const TRANG_THAI_HOAT_DONG = 1;

    protected $table = 'so_thichs';

    protected $primaryKey = 'ma_so_thich';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'ma_so_thich',
        'ma_khach_hang',
        'ma_tag',
        'muc_do'
    ];
}
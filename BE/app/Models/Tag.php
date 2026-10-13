<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use SoftDeletes;

    public const TRANG_THAI_TAM_TAT   = 0;
    public const TRANG_THAI_HOAT_DONG = 1;

    protected $table = 'tags';

    protected $primaryKey = 'ma_tag';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'ma_tag',
        'ten_tag',
        'mo_ta'
    ];
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class XaPhuong extends Model
{
    use HasFactory;

    public const TRANG_THAI_TAM_TAT   = 0;
    public const TRANG_THAI_HOAT_DONG = 1;

    protected $table = 'xa_phuong';

    protected $primaryKey = 'ma_xa';
    protected $keyType = 'string';
    public $incrementing = false;

    public $timestamps = false;


    protected $fillable = [
        'ma_xa',
        'ma_tinh',
        'ten_xa',
        'loai_don_vi',
        'dang_hoat_dong',
    ];

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class HanhViNguoiDung extends Model
{
    use SoftDeletes;

    public const TRANG_THAI_TAM_TAT   = 0;
    public const TRANG_THAI_HOAT_DONG = 1;

    protected $table = 'hanh_vi_nguoi_dungs';

    protected $primaryKey = 'ma_hanh_vi';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'ma_hanh_vi',
        'ma_khach_hang',
        'ma_dia_diem',
        'ma_ke_hoach',
        'ma_ly_do',
        'loai_hanh_vi',
        'gia_tri'
    ];
}
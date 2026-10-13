<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class KhachHang extends Authenticatable
{
    use SoftDeletes, HasApiTokens, HasFactory, Notifiable;

    public const TRANG_THAI_TAM_TAT   = 0;
    public const TRANG_THAI_HOAT_DONG = 1;

    protected $table = 'khach_hangs';

    protected $primaryKey = 'ma_khach_hang';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'ma_khach_hang',
        'ho_va_ten',
        'email',
        'mat_khau',
        'ngay_sinh',
        'gioi_tinh',
        'so_dien_thoai',
        'is_block',
        'is_xac_thuc',
        'ma_xac_thuc',
        'hash_reset',
    ];

    protected $hidden = [
        'mat_khau',
    ];

    public function getAuthPassword()
    {
        return $this->mat_khau;
    }
}
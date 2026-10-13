<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admin extends Authenticatable
{
    use SoftDeletes, HasApiTokens, HasFactory, Notifiable;

    public const TRANG_THAI_TAM_TAT   = 0;
    public const TRANG_THAI_HOAT_DONG = 1;

    protected $table = 'admins';

    protected $primaryKey = 'ma_admin';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'ma_admin',
        'ho_va_ten',
        'email',
        'mat_khau',
        'ma_chuc_vu',
        'is_block',
        'is_master',
    ];

    protected $hidden = [
        'mat_khau',
    ];

    public function getAuthPassword()
    {
        return $this->mat_khau;
    }

    public function getIdChucVuAttribute()
    {
        return $this->ma_chuc_vu;
    }

    public function getTrangThaiAttribute()
    {
        return $this->is_block == 1 ? 0 : 1;
    }
}
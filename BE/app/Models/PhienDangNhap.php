<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PhienDangNhap extends Model
{
    use HasFactory;

    public const TRANG_THAI_TAM_TAT   = 0;
    public const TRANG_THAI_HOAT_DONG = 1;

    protected $table = 'phien_dang_nhap';

    protected $primaryKey = 'ma_phien';

    const CREATED_AT = 'ngay_tao';
    const UPDATED_AT = null;


    protected $fillable = [
        'ma_nguoi_dung',
        'refresh_token_hash',
        'thiet_bi',
        'ip_address',
        'het_han_luc',
        'ngay_thu_hoi',
        'ngay_tao',
    ];

}

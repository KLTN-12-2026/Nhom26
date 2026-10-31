<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ChiTietHoaDon extends Model
{
    use HasFactory;

    public const TRANG_THAI_TAM_TAT   = 0;
    public const TRANG_THAI_HOAT_DONG = 1;

    protected $table = 'chi_tiet_hoa_don';

    protected $primaryKey = 'ma_chi_tiet';

    public $timestamps = false;


    protected $fillable = [
        'ma_hoa_don',
        'ten_khoan_muc',
        'loai_khoan_muc',
        'loai_khach',
        'so_luong',
        'don_gia',
        'thanh_tien',
    ];

}

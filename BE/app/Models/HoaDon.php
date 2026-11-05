<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HoaDon extends Model
{
    use HasFactory;

    public const TRANG_THAI_TAM_TAT   = 0;
    public const TRANG_THAI_HOAT_DONG = 1;

    protected $table = 'hoa_don';

    protected $primaryKey = 'ma_hoa_don';

    const CREATED_AT = 'ngay_lap';
    const UPDATED_AT = null;


    protected $fillable = [
        'ma_dat_tour',
        'tong_tien',
        'trang_thai',
        'ngay_lap',
        'ngay_thanh_toan',
    ];

}

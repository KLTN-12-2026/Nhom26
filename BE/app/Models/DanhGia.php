<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DanhGia extends Model
{
    use HasFactory;

    public const TRANG_THAI_TAM_TAT   = 0;
    public const TRANG_THAI_HOAT_DONG = 1;

    protected $table = 'danh_gia';

    protected $primaryKey = 'ma_danh_gia';

    const CREATED_AT = 'ngay_tao';
    const UPDATED_AT = null;


    protected $fillable = [
        'ma_nguoi_dung',
        'ma_dia_diem',
        'ma_tour',
        'ma_dat_tour',
        'so_sao',
        'noi_dung',
        'trang_thai',
        'nguoi_kiem_duyet_id',
        'ngay_kiem_duyet',
        'ly_do_an',
        'ngay_tao',
    ];

}

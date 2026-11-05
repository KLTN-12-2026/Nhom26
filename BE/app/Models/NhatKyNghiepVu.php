<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class NhatKyNghiepVu extends Model
{
    use HasFactory;

    public const TRANG_THAI_TAM_TAT   = 0;
    public const TRANG_THAI_HOAT_DONG = 1;

    protected $table = 'nhat_ky_nghiep_vu';

    protected $primaryKey = 'ma_nhat_ky';

    const CREATED_AT = 'ngay_tao';
    const UPDATED_AT = null;


    protected $fillable = [
        'ma_nguoi_thuc_hien',
        'ma_doi_tac',
        'ma_dia_diem',
        'ma_tour',
        'ma_danh_gia',
        'ma_dat_tour',
        'trang_thai_cu',
        'trang_thai_moi',
        'hanh_dong',
        'ly_do',
        'ngay_tao',
    ];

}

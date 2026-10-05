<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DiaDiem extends Model
{
    use SoftDeletes;

    public const TRANG_THAI_TAM_TAT   = 0;
    public const TRANG_THAI_HOAT_DONG = 1;

    protected $table = 'dia_diems';

    protected $primaryKey = 'ma_dia_diem';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'ma_dia_diem',
        'ma_doi_tac_tao',
        'ten_dia_diem',
        'loai',
        'dia_chi',
        'so_dien_thoai',
        'kinh_do',
        'vi_do',
        'gio_mo_cua',
        'gio_dong_cua',
        'gia_giao_dong',
        'hinh_anh_dai_dien',
        'mo_ta',
        'trang_thai_duyet',
        'trang_thai_hien_thi',
        'ly_do_tu_choi'
    ];
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DichVu extends Model
{
    use SoftDeletes;

    public const TRANG_THAI_TAM_TAT   = 0;
    public const TRANG_THAI_HOAT_DONG = 1;

    protected $table = 'dich_vus';

    protected $primaryKey = 'ma_dich_vu';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'ma_dich_vu',
        'ma_doi_tac',
        'ma_dia_diem',
        'ten_dich_vu',
        'loai_dich_vu',
        'mo_ta',
        'don_gia',
        'don_vi_tinh',
        'trang_thai_duyet',
        'trang_thai'
    ];
}
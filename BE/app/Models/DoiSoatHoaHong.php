<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class DoiSoatHoaHong extends Model
{
    use SoftDeletes;

    public const TRANG_THAI_TAM_TAT   = 0;
    public const TRANG_THAI_HOAT_DONG = 1;

    protected $table = 'doi_soat_hoa_hongs';

    protected $primaryKey = 'ma_doi_soat';

    protected $fillable = [
        'ma_hoa_don',
        'ma_doi_tac',
        'tong_tien_giao_dich',
        'phan_tram_hoa_hong',
        'tien_hoa_hong_admin',
        'tien_doi_tac_thuc_nhan',
        'trang_thai_thanh_toan',
        'ngay_doi_soat'
    ];
}
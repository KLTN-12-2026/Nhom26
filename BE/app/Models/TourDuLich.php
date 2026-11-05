<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class TourDuLich extends Model
{
    use HasFactory, SoftDeletes;

    public const TRANG_THAI_TAM_TAT   = 0;
    public const TRANG_THAI_HOAT_DONG = 1;

    protected $table = 'tour_du_lich';

    protected $primaryKey = 'ma_tour';

    const CREATED_AT = 'ngay_tao';
    const UPDATED_AT = 'ngay_cap_nhat';

    const DELETED_AT = 'ngay_xoa';

    protected $fillable = [
        'ma_doi_tac',
        'ten_tour',
        'mo_ta',
        'so_ngay',
        'gia_nguoi_lon',
        'gia_tre_em',
        'gia_em_be',
        'diem_tap_trung',
        'vi_do_tap_trung',
        'kinh_do_tap_trung',
        'noi_dung_bao_gom',
        'noi_dung_khong_bao_gom',
        'trang_thai_duyet',
        'nguoi_duyet_id',
        'ly_do_tu_choi',
        'ngay_tao',
        'ngay_cap_nhat',
    ];

}

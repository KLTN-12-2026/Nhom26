<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DatTour extends Model
{
    use HasFactory;

    public const TRANG_THAI_TAM_TAT   = 0;
    public const TRANG_THAI_HOAT_DONG = 1;

    protected $table = 'dat_tour';

    protected $primaryKey = 'ma_dat_tour';

    const CREATED_AT = 'ngay_dat';
    const UPDATED_AT = 'ngay_cap_nhat';


    protected $fillable = [
        'ma_don_hang',
        'ma_nguoi_dung',
        'ma_lich_khoi_hanh',
        'ma_voucher',
        'ngay_ap_dung_voucher',
        'so_nguoi',
        'tong_tien',
        'so_tien_giam',
        'thanh_tien',
        'trang_thai',
        'ghi_chu',
        'ly_do_tu_choi',
        'ly_do_huy',
        'ngay_huy',
        'het_han_giu_cho',
        'phien_ban_chinh_sach',
        'ti_le_hoan_chot',
        'so_tien_hoan_lai',
        'nguoi_xu_ly_id',
        'ngay_xu_ly',
        'ngay_dat',
        'ngay_cap_nhat',
    ];

}

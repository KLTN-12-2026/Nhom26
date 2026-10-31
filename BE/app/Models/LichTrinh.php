<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class LichTrinh extends Model
{
    use HasFactory, SoftDeletes;

    public const TRANG_THAI_TAM_TAT   = 0;
    public const TRANG_THAI_HOAT_DONG = 1;

    protected $table = 'lich_trinh';

    protected $primaryKey = 'ma_lich_trinh';

    const CREATED_AT = 'ngay_tao';
    const UPDATED_AT = 'ngay_cap_nhat';

    const DELETED_AT = 'ngay_xoa';

    protected $fillable = [
        'ma_nguoi_dung',
        'ma_lich_trinh_goc',
        'la_cong_khai',
        'ten_lich_trinh',
        'ngay_bat_dau',
        'ngay_ket_thuc',
        'tong_ngan_sach',
        'so_nguoi',
        'phuong_tien',
        'nhip_do',
        'tong_chi_phi_du_kien',
        'ti_le_phu_hop',
        'trang_thai',
        'ngay_tao',
        'ngay_cap_nhat',
    ];

}

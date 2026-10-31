<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LichSuGiaoDich extends Model
{
    use HasFactory;

    public const TRANG_THAI_TAM_TAT   = 0;
    public const TRANG_THAI_HOAT_DONG = 1;

    protected $table = 'lich_su_giao_dich';

    protected $primaryKey = 'ma_giao_dich_noi_bo';

    const CREATED_AT = 'ngay_tao';
    const UPDATED_AT = null;


    protected $fillable = [
        'ma_hoa_don',
        'ma_giao_dich_goc',
        'ma_giao_dich_cong',
        'ma_yeu_cau',
        'loai_giao_dich',
        'phuong_thuc',
        'so_tien',
        'nguoi_xac_nhan_id',
        'trang_thai',
        'phan_hoi_cong',
        'ngay_tao',
        'ngay_hoan_tat',
    ];

}

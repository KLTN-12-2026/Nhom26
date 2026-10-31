<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Voucher extends Model
{
    use HasFactory;

    public const TRANG_THAI_TAM_TAT   = 0;
    public const TRANG_THAI_HOAT_DONG = 1;

    protected $table = 'voucher';

    protected $primaryKey = 'ma_voucher';

    const CREATED_AT = 'ngay_tao';
    const UPDATED_AT = null;


    protected $fillable = [
        'nguoi_tao_id',
        'ma_doi_tac',
        'ma_giam_gia',
        'loai_giam_gia',
        'gia_tri_giam',
        'gia_tri_don_toi_thieu',
        'giam_toi_da',
        'ngay_bat_dau',
        'ngay_ket_thuc',
        'gioi_han_su_dung',
        'so_lan_da_dung',
        'trang_thai_kich_hoat',
        'ngay_tao',
    ];

}

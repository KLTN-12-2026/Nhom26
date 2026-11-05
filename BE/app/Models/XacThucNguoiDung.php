<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class XacThucNguoiDung extends Model
{
    use HasFactory;

    public const TRANG_THAI_TAM_TAT   = 0;
    public const TRANG_THAI_HOAT_DONG = 1;

    protected $table = 'xac_thuc_nguoi_dung';

    protected $primaryKey = 'ma_xac_thuc';

    const CREATED_AT = 'ngay_tao';
    const UPDATED_AT = null;


    protected $fillable = [
        'ma_nguoi_dung',
        'loai_ma',
        'ma_hash',
        'het_han_luc',
        'da_su_dung',
        'so_lan_thu',
        'ngay_tao',
    ];

}

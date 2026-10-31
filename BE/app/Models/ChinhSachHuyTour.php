<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ChinhSachHuyTour extends Model
{
    use HasFactory;

    public const TRANG_THAI_TAM_TAT   = 0;
    public const TRANG_THAI_HOAT_DONG = 1;

    protected $table = 'chinh_sach_huy_tour';

    protected $primaryKey = 'ma_chinh_sach';

    const CREATED_AT = 'ngay_tao';
    const UPDATED_AT = null;


    protected $fillable = [
        'ma_tour',
        'phien_ban',
        'so_gio_truoc_khoi_hanh',
        'ti_le_hoan_tien',
        'ngay_tao',
    ];

}

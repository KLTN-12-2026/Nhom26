<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ThongBao extends Model
{
    use HasFactory;

    public const TRANG_THAI_TAM_TAT   = 0;
    public const TRANG_THAI_HOAT_DONG = 1;

    protected $table = 'thong_bao';

    protected $primaryKey = 'ma_thong_bao';

    const CREATED_AT = 'ngay_tao';
    const UPDATED_AT = null;


    protected $fillable = [
        'ma_nguoi_nhan',
        'tieu_de',
        'noi_dung',
        'loai_thong_bao',
        'duong_dan_lien_ket',
        'da_doc',
        'ngay_tao',
    ];

}

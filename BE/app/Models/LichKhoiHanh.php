<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class LichKhoiHanh extends Model
{
    use HasFactory;

    public const TRANG_THAI_TAM_TAT   = 0;
    public const TRANG_THAI_HOAT_DONG = 1;

    protected $table = 'lich_khoi_hanh';

    protected $primaryKey = 'ma_lich_khoi_hanh';

    public $timestamps = false;


    protected $fillable = [
        'ma_tour',
        'ngay_khoi_hanh',
        'ngay_ket_thuc_du_kien',
        'gio_khoi_hanh',
        'tong_so_cho',
        'so_cho_con_lai',
        'trang_thai',
    ];

}

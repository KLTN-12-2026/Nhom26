<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DiaDiemYeuThich extends Model
{
    use HasFactory;

    public const TRANG_THAI_TAM_TAT   = 0;
    public const TRANG_THAI_HOAT_DONG = 1;

    protected $table = 'dia_diem_yeu_thich';

    protected $primaryKey = ['ma_nguoi_dung', 'ma_dia_diem'];
    public $incrementing = false;

    public $timestamps = false;


    protected $fillable = [
        'ma_nguoi_dung',
        'ma_dia_diem',
        'ngay_luu',
    ];

}

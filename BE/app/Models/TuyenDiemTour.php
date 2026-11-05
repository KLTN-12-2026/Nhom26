<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TuyenDiemTour extends Model
{
    use HasFactory;

    public const TRANG_THAI_TAM_TAT   = 0;
    public const TRANG_THAI_HOAT_DONG = 1;

    protected $table = 'tuyen_diem_tour';

    protected $primaryKey = 'id';

    public $timestamps = false;


    protected $fillable = [
        'ma_tour',
        'ma_dia_diem',
        'thu_tu',
    ];

}

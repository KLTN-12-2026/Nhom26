<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DiaDiemThe extends Model
{
    use HasFactory;

    public const TRANG_THAI_TAM_TAT   = 0;
    public const TRANG_THAI_HOAT_DONG = 1;

    protected $table = 'dia_diem_the';

    protected $primaryKey = ['ma_dia_diem', 'ma_the'];
    public $incrementing = false;

    public $timestamps = false;


    protected $fillable = [
        'ma_dia_diem',
        'ma_the',
    ];

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class KhachThamGiaTour extends Model
{
    use HasFactory;

    public const TRANG_THAI_TAM_TAT   = 0;
    public const TRANG_THAI_HOAT_DONG = 1;

    protected $table = 'khach_tham_gia_tour';

    protected $primaryKey = 'ma_khach';

    public $timestamps = false;


    protected $fillable = [
        'ma_dat_tour',
        'ho_ten',
        'so_dien_thoai',
        'loai_khach',
        'ghi_chu',
    ];

}

<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SoThichDuKhach extends Model
{
    use HasFactory;

    public const TRANG_THAI_TAM_TAT   = 0;
    public const TRANG_THAI_HOAT_DONG = 1;

    protected $table = 'so_thich_du_khach';

    protected $primaryKey = ['ma_nguoi_dung', 'ma_the'];
    public $incrementing = false;

    public $timestamps = false;


    protected $fillable = [
        'ma_nguoi_dung',
        'ma_the',
        'muc_do_uu_tien',
    ];

}

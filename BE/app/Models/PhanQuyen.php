<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class PhanQuyen extends Model
{
    use HasFactory;

    public const TRANG_THAI_TAM_TAT   = 0;
    public const TRANG_THAI_HOAT_DONG = 1;

    protected $table = 'phan_quyen';

    protected $primaryKey = 'ma_phan_quyen';

    public $timestamps = false;


    protected $fillable = [
        'ma_nguoi_dung',
        'ma_chuc_vu',
        'ma_chuc_nang',
    ];

}

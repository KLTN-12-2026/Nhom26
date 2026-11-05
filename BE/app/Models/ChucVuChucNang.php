<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ChucVuChucNang extends Model
{
    use HasFactory;

    public const TRANG_THAI_TAM_TAT   = 0;
    public const TRANG_THAI_HOAT_DONG = 1;

    protected $table = 'chuc_vu_chuc_nang';

    protected $primaryKey = ['ma_chuc_vu', 'ma_chuc_nang'];
    public $incrementing = false;

    public $timestamps = false;


    protected $fillable = [
        'ma_chuc_vu',
        'ma_chuc_nang',
    ];

}

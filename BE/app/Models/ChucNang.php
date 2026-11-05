<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ChucNang extends Model
{
    use HasFactory;

    public const TRANG_THAI_TAM_TAT   = 0;
    public const TRANG_THAI_HOAT_DONG = 1;

    protected $table = 'chuc_nang';

    protected $primaryKey = 'ma_chuc_nang';

    public $timestamps = false;


    protected $fillable = [
        'ten_chuc_nang',
        'nhom_chuc_nang',
        'mo_ta',
    ];

}

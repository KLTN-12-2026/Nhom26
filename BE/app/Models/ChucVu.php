<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ChucVu extends Model
{
    use HasFactory;

    public const TRANG_THAI_TAM_TAT   = 0;
    public const TRANG_THAI_HOAT_DONG = 1;

    protected $table = 'chuc_vu';

    protected $primaryKey = 'ma_chuc_vu';

    public $timestamps = false;


    protected $fillable = [
        'ten_chuc_vu',
        'mo_ta',
    ];

}

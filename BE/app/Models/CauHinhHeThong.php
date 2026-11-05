<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class CauHinhHeThong extends Model
{
    use HasFactory;

    public const TRANG_THAI_TAM_TAT   = 0;
    public const TRANG_THAI_HOAT_DONG = 1;

    protected $table = 'cau_hinh_he_thong';

    protected $primaryKey = 'khoa_cau_hinh';
    protected $keyType = 'string';
    public $incrementing = false;

    const CREATED_AT = null;
    const UPDATED_AT = 'ngay_cap_nhat';


    protected $fillable = [
        'khoa_cau_hinh',
        'gia_tri',
        'mo_ta',
        'ngay_cap_nhat',
    ];

}

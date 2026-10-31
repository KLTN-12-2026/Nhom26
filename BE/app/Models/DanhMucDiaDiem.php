<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class DanhMucDiaDiem extends Model
{
    use HasFactory;

    public const TRANG_THAI_TAM_TAT   = 0;
    public const TRANG_THAI_HOAT_DONG = 1;

    protected $table = 'danh_muc_dia_diem';

    protected $primaryKey = 'ma_danh_muc';

    const CREATED_AT = 'ngay_tao';
    const UPDATED_AT = null;


    protected $fillable = [
        'ten_danh_muc',
        'bieu_tuong',
        'ngay_tao',
    ];

}

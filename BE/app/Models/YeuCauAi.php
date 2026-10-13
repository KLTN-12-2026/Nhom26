<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class YeuCauAi extends Model
{
    use SoftDeletes;

    public const TRANG_THAI_TAM_TAT   = 0;
    public const TRANG_THAI_HOAT_DONG = 1;

    protected $table = 'yeu_cau_ais';

    protected $primaryKey = 'ma_yeu_cau';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'ma_yeu_cau',
        'ma_khach_hang',
        'ma_ke_hoach',
        'yeu_cau',
        'ket_qua',
        'ngay_tao'
    ];
}
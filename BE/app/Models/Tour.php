<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tour extends Model
{
    use SoftDeletes;

    public const TRANG_THAI_TAM_TAT   = 0;
    public const TRANG_THAI_HOAT_DONG = 1;

    protected $table = 'tours';

    protected $primaryKey = 'ma_tour';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'ma_tour',
        'ma_doi_tac',
        'ten_tour',
        'mo_ta',
        'hinh_anh_dai_dien',
        'so_ngay',
        'so_nguoi_toi_da',
        'trang_thai_duyet',
        'trang_thai_hien_thi',
        'ly_do_tu_choi'
    ];
}
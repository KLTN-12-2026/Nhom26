<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class VoucherTour extends Model
{
    use HasFactory;

    public const TRANG_THAI_TAM_TAT   = 0;
    public const TRANG_THAI_HOAT_DONG = 1;

    protected $table = 'voucher_tour';

    protected $primaryKey = ['ma_voucher', 'ma_tour'];
    public $incrementing = false;

    public $timestamps = false;


    protected $fillable = [
        'ma_voucher',
        'ma_tour',
    ];

}

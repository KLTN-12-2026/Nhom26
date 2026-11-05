<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class TheSoThich extends Model
{
    use HasFactory;

    public const TRANG_THAI_TAM_TAT   = 0;
    public const TRANG_THAI_HOAT_DONG = 1;

    protected $table = 'the_so_thich';

    protected $primaryKey = 'ma_the';

    public $timestamps = false;


    protected $fillable = [
        'ten_the',
        'nhom_the',
        'mo_ta',
    ];

}

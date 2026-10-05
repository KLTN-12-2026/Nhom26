<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class LyDoHanhVi extends Model
{
    use SoftDeletes;


    protected $table = 'ly_do_hanh_vis';

    protected $primaryKey = 'ma_ly_do';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'ma_ly_do',
        'ma_ly_do_code',
        'ten_ly_do',
        'mo_ta'
    ];
}
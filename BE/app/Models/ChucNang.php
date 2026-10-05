<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ChucNang extends Model
{
    use SoftDeletes;


    protected $table = 'chuc_nangs';

    protected $primaryKey = 'ma_chuc_nang';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'ma_chuc_nang',
        'ten_chuc_nang',
        'mo_ta'
    ];
}
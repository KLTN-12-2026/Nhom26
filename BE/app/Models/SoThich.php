<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class SoThich extends Model
{
    use SoftDeletes;


    protected $table = 'so_thichs';

    protected $primaryKey = 'ma_so_thich';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'ma_so_thich',
        'ma_khach_hang',
        'ma_tag',
        'muc_do'
    ];
}
<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tag extends Model
{
    use SoftDeletes;


    protected $table = 'tags';

    protected $primaryKey = 'ma_tag';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'ma_tag',
        'ten_tag',
        'mo_ta'
    ];
}
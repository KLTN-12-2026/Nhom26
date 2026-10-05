<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class PhanQuyenAdmin extends Model
{
    use SoftDeletes;


    protected $table = 'phan_quyen_admins';

    protected $primaryKey = 'ma_phan_quyen';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'ma_phan_quyen',
        'ma_chuc_nang',
        'ma_chuc_vu',
        'quyen_xem',
        'quyen_them',
        'quyen_sua',
        'quyen_xoa'
    ];
}
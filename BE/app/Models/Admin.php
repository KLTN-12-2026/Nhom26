<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class Admin extends Authenticatable
{
    use SoftDeletes, HasApiTokens, HasFactory, Notifiable;


    protected $table = 'admins';

    protected $primaryKey = 'ma_admin';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'ma_admin',
        'ho_va_ten',
        'email',
        'mat_khau',
        'ma_chuc_vu',
        'is_block'
    ];
}
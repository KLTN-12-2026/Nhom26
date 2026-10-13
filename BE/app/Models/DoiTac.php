<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;

class DoiTac extends Authenticatable
{
    use SoftDeletes, HasApiTokens, HasFactory, Notifiable;

    public const TRANG_THAI_TAM_TAT   = 0;
    public const TRANG_THAI_HOAT_DONG = 1;

    protected $table = 'doi_tacs';

    protected $primaryKey = 'ma_doi_tac';
    protected $keyType = 'string';
    public $incrementing = false;

    protected $fillable = [
        'ma_doi_tac',
        'ten_doi_tac',
        'ma_so_thue',
        'ten_nguoi_dai_dien',
        'email',
        'mat_khau',
        'so_dien_thoai',
        'dia_chi',
        'is_block',
        'trang_thai_duyet',
        'ly_do_tu_choi',
    ];

    protected $hidden = [
        'mat_khau',
    ];

    public function getAuthPassword()
    {
        return $this->mat_khau;
    }
}
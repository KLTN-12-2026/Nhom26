<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class HoSoDoiTac extends Model
{
    use HasFactory;

    public const TRANG_THAI_TAM_TAT   = 0;
    public const TRANG_THAI_HOAT_DONG = 1;

    protected $table = 'ho_so_doi_tac';

    protected $primaryKey = 'ma_doi_tac';

    const CREATED_AT = 'ngay_tao';
    const UPDATED_AT = 'ngay_cap_nhat';


    protected $fillable = [
        'ma_nguoi_dung',
        'ten_cong_ty',
        'ma_so_thue',
        'giay_phep_kinh_doanh_url',
        'dia_chi',
        'email_lien_he',
        'so_dien_thoai',
        'trang_thai_duyet',
        'ngay_duyet',
        'ly_do_tu_choi',
        'nguoi_duyet_id',
        'ngay_tao',
        'ngay_cap_nhat',
    ];

}

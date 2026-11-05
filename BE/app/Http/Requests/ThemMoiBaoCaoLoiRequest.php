<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThemMoiBaoCaoLoiRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'ma_khach_hang'  => 'required|string|max:50',
            'tieu_de'        => 'required|string|max:255',
            'loai'           => 'required|string|max:100',
            'mo_ta'          => 'required|string',
            'trang_thai'     => 'nullable|string|max:50',
        ];
    }

    public function messages(): array
    {
        return [
            'required' => ':attribute không được để trống.',
            'string'   => ':attribute phải là chuỗi ký tự.',
            'max'      => ':attribute không được vượt quá :max ký tự.',
        ];
    }

    public function attributes(): array
    {
        return [
            'ma_khach_hang'  => 'Mã khách hàng / Người gửi',
            'tieu_de'        => 'Tiêu đề báo cáo lỗi',
            'loai'           => 'Phân loại lỗi',
            'mo_ta'          => 'Mô tả chi tiết sự cố',
            'trang_thai'     => 'Trạng thái',
        ];
    }
}

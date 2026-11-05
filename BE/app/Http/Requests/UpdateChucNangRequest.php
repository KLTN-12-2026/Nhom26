<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateChucNangRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'ma_chuc_nang'  => 'nullable|string',
            'id'            => 'nullable|string',
            'ten_chuc_nang' => 'required|string|max:255',
            'duong_dan'     => 'nullable|string|max:255',
            'path'          => 'nullable|string|max:255',
            'mo_ta'         => 'nullable|string',
            'trang_thai'    => 'nullable|integer',
        ];
    }

    public function messages(): array
    {
        return [
            'required' => ':attribute không được để trống.',
            'string'   => ':attribute phải là chuỗi ký tự.',
            'max'      => ':attribute không được vượt quá :max ký tự.',
            'integer'  => ':attribute phải là số nguyên.',
        ];
    }

    public function attributes(): array
    {
        return [
            'ma_chuc_nang'  => 'Mã chức năng',
            'ten_chuc_nang' => 'Tên chức năng',
            'duong_dan'     => 'Đường dẫn',
            'path'          => 'Đường dẫn',
            'mo_ta'         => 'Mô tả chức năng',
            'trang_thai'    => 'Trạng thái',
        ];
    }
}

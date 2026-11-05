<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateChucVuRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'ma_chuc_vu'  => 'nullable|string',
            'id'          => 'nullable|string',
            'ten_chuc_vu' => 'required|string|max:255',
            'mo_ta'       => 'nullable|string',
            'trang_thai'  => 'nullable|integer',
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
            'ma_chuc_vu'  => 'Mã chức vụ',
            'ten_chuc_vu' => 'Tên chức vụ',
            'mo_ta'       => 'Mô tả chức vụ',
            'trang_thai'  => 'Trạng thái',
        ];
    }
}

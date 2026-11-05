<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTagRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'ma_tag'  => 'required|string|max:50|exists:tags,ma_tag',
            'ten_tag' => 'required|string|max:255',
            'mo_ta'   => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'required' => ':attribute không được để trống.',
            'string'   => ':attribute phải là chuỗi ký tự.',
            'max'      => ':attribute không được vượt quá :max ký tự.',
            'exists'   => ':attribute không tồn tại trong hệ thống.',
        ];
    }

    public function attributes(): array
    {
        return [
            'ma_tag'  => 'Mã tag',
            'ten_tag' => 'Tên tag',
            'mo_ta'   => 'Mô tả tag',
        ];
    }
}

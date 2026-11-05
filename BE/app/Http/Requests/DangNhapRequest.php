<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DangNhapRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'email'    => 'required|email',
            'mat_khau' => 'required|string',
        ];
    }

    public function messages(): array
    {
        return [
            'required' => ':attribute không được để trống.',
            'email'    => ':attribute không đúng định dạng email.',
            'string'   => ':attribute phải là chuỗi ký tự.',
        ];
    }

    public function attributes(): array
    {
        return [
            'email'    => 'Địa chỉ email',
            'mat_khau' => 'Mật khẩu',
        ];
    }
}

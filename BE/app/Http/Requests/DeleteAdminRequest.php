<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeleteAdminRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'ma_admin' => 'required|string|exists:admins,ma_admin',
        ];
    }

    public function messages(): array
    {
        return [
            'ma_admin.required' => 'Mã Admin không được để trống.',
            'ma_admin.string'   => 'Mã Admin phải là chuỗi.',
            'ma_admin.exists'   => 'Tài khoản Admin không tồn tại trong hệ thống.',
        ];
    }

    public function attributes(): array
    {
        return [
            'ma_admin' => 'Mã Admin',
        ];
    }
}

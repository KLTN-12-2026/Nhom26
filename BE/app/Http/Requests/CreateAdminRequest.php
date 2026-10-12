<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class CreateAdminRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'ma_admin'   => 'required|string|max:50|unique:admins,ma_admin',
            'ho_va_ten'  => 'required|string|max:255',
            'email'      => 'required|email|unique:admins,email',
            'mat_khau'   => 'required|string|min:6',
            'ma_chuc_vu' => 'required|string|exists:chuc_vus,ma_chuc_vu',
            'is_block'   => 'nullable|boolean',
        ];
    }

    protected function prepareForValidation(): void
    {
        if ($this->ma_admin === '' || $this->ma_admin === null) {
            $this->request->remove('ma_admin');
        }
        if ($this->mat_khau === '' || $this->mat_khau === null) {
            $this->request->remove('mat_khau');
        }
    }

    public function messages(): array
    {
        return [
            'required'       => ':attribute không được để trống.',
            'email'          => ':attribute không đúng định dạng email.',
            'string'         => ':attribute phải là chuỗi.',
            'exists'         => ':attribute không tồn tại.',
            'max'            => ':attribute không được vượt quá :max ký tự.',
            'min'            => ':attribute phải tối thiểu :min ký tự.',
            'unique'         => ':attribute đã tồn tại trong hệ thống.',
            'boolean'        => ':attribute phải là true hoặc false.',
        ];
    }

    public function attributes(): array
    {
        return [
            'ma_admin'   => 'Mã Admin',
            'ho_va_ten'  => 'Họ và tên',
            'email'      => 'Email',
            'mat_khau'   => 'Mật khẩu',
            'ma_chuc_vu' => 'Chức vụ',
            'is_block'   => 'Trạng thái khóa',
        ];
    }
}


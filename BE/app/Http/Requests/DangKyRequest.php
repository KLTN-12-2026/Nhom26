<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DangKyRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'ho_va_ten'     => 'required|string|max:255',
            'email'         => 'required|email|max:255|unique:khach_hangs,email',
            'so_dien_thoai' => 'nullable|string|max:20',
            'mat_khau'      => 'required|string|min:6',
            'xac_nhan_mk'   => 'nullable|same:mat_khau',
        ];
    }

    public function messages(): array
    {
        return [
            'required' => ':attribute không được để trống.',
            'string'   => ':attribute phải là chuỗi ký tự.',
            'max'      => ':attribute không được vượt quá :max ký tự.',
            'min'      => ':attribute phải có ít nhất :min ký tự.',
            'email'    => ':attribute không đúng định dạng email.',
            'unique'   => ':attribute đã được sử dụng trên hệ thống.',
            'same'     => ':attribute không khớp với mật khẩu.',
        ];
    }

    public function attributes(): array
    {
        return [
            'ho_va_ten'     => 'Họ và tên',
            'email'         => 'Địa chỉ email',
            'so_dien_thoai' => 'Số điện thoại',
            'mat_khau'      => 'Mật khẩu',
            'xac_nhan_mk'   => 'Xác nhận mật khẩu',
        ];
    }
}

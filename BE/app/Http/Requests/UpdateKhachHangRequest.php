<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateKhachHangRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        $id = $this->ma_khach_hang ?? $this->id;

        return [
            'ma_khach_hang' => 'nullable|string',
            'id'            => 'nullable|string',
            'ho_va_ten'     => 'required|string|max:255',
            'email'         => 'required|email|unique:khach_hangs,email,' . $id . ',ma_khach_hang',
            'mat_khau'      => 'nullable|string|min:6',
            'ngay_sinh'     => 'nullable|date',
            'gioi_tinh'     => 'nullable|integer',
            'so_dien_thoai' => 'nullable|string|max:20',
            'is_block'      => 'nullable|integer',
        ];
    }

    public function messages(): array
    {
        return [
            'required' => ':attribute không được để trống.',
            'email'    => ':attribute không đúng định dạng email.',
            'string'   => ':attribute phải là chuỗi ký tự.',
            'max'      => ':attribute không được vượt quá :max ký tự.',
            'min'      => ':attribute phải có tối thiểu :min ký tự.',
            'unique'   => ':attribute đã tồn tại trong hệ thống.',
            'date'     => ':attribute không đúng định dạng ngày.',
            'integer'  => ':attribute không đúng định dạng số.',
        ];
    }

    public function attributes(): array
    {
        return [
            'ma_khach_hang' => 'Mã khách hàng',
            'ho_va_ten'     => 'Họ và tên',
            'email'         => 'Email',
            'mat_khau'      => 'Mật khẩu',
            'ngay_sinh'     => 'Ngày sinh',
            'gioi_tinh'     => 'Giới tính',
            'so_dien_thoai' => 'Số điện thoại',
            'is_block'      => 'Trạng thái khóa',
        ];
    }
}

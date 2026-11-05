<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateBaoCaoLoiRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id'             => 'required|integer|exists:phan_hois,id',
            'trang_thai'     => 'required|string|max:50',
            'phan_hoi_admin' => 'nullable|string',
            'ma_admin_xu_ly' => 'nullable|string|max:50',
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
            'id'             => 'Mã ticket / Báo cáo lỗi',
            'trang_thai'     => 'Trạng thái xử lý',
            'phan_hoi_admin' => 'Nội dung phản hồi của quản trị viên',
            'ma_admin_xu_ly' => 'Mã quản trị viên xử lý',
        ];
    }
}

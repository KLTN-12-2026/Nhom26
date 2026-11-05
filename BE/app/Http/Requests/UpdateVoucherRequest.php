<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateVoucherRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'id'            => 'nullable|integer|exists:vouchers,id',
            'ma_voucher'    => 'required|string|max:50',
            'ma_doi_tac'    => 'nullable|string|max:50',
            'ten_voucher'   => 'required|string|max:255',
            'loai_giam_gia' => 'required|string|max:50',
            'gia_tri_giam'  => 'required|numeric|min:0',
            'giam_toi_da'   => 'nullable|numeric|min:0',
            'don_toi_thieu' => 'nullable|numeric|min:0',
            'so_luong'      => 'nullable|integer|min:0',
            'ngay_bat_dau'  => 'nullable|date',
            'ngay_ket_thuc' => 'nullable|date',
            'trang_thai'    => 'nullable|integer',
        ];
    }

    public function messages(): array
    {
        return [
            'required' => ':attribute không được để trống.',
            'string'   => ':attribute phải là chuỗi ký tự.',
            'max'      => ':attribute không được vượt quá :max ký tự.',
            'exists'   => ':attribute không tồn tại trong hệ thống.',
            'numeric'  => ':attribute phải là số.',
            'integer'  => ':attribute phải là số nguyên.',
            'min'      => ':attribute không được nhỏ hơn :min.',
            'date'     => ':attribute phải đúng định dạng ngày tháng.',
        ];
    }

    public function attributes(): array
    {
        return [
            'id'            => 'ID voucher',
            'ma_voucher'    => 'Mã voucher',
            'ma_doi_tac'    => 'Mã đối tác',
            'ten_voucher'   => 'Tên voucher',
            'loai_giam_gia' => 'Loại giảm giá',
            'gia_tri_giam'  => 'Giá trị giảm',
            'giam_toi_da'   => 'Giảm tối đa',
            'don_toi_thieu' => 'Đơn tối thiểu',
            'so_luong'      => 'Số lượng',
            'ngay_bat_dau'  => 'Ngày bắt đầu',
            'ngay_ket_thuc' => 'Ngày kết thúc',
            'trang_thai'    => 'Trạng thái',
        ];
    }
}

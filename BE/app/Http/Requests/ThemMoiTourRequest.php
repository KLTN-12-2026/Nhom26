<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThemMoiTourRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'ma_tour'             => 'nullable|string|max:50|unique:tours,ma_tour',
            'ma_doi_tac'          => 'required|string|exists:doi_tacs,ma_doi_tac',
            'ten_tour'            => 'required|string|max:255',
            'gia_tour'            => 'nullable|numeric|min:0',
            'gia_khoi_hanh'       => 'nullable|numeric|min:0',
            'mo_ta'               => 'nullable|string',
            'hinh_anh_dai_dien'   => 'nullable|string',
            'so_ngay'             => 'nullable|integer|min:1',
            'so_nguoi_toi_da'     => 'nullable|integer|min:1',
            'trang_thai_duyet'    => 'nullable|string|max:50',
            'trang_thai_hien_thi' => 'nullable|integer',
            'ly_do_tu_choi'       => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'required' => ':attribute không được để trống.',
            'string'   => ':attribute phải là chuỗi ký tự.',
            'numeric'  => ':attribute phải là định dạng số.',
            'max'      => ':attribute không được vượt quá :max ký tự.',
            'min'      => ':attribute phải có giá trị tối thiểu là :min.',
            'integer'  => ':attribute phải là số nguyên.',
            'unique'   => ':attribute đã tồn tại trong hệ thống.',
            'exists'   => ':attribute không tồn tại trong hệ thống.',
        ];
    }

    public function attributes(): array
    {
        return [
            'ma_tour'             => 'Mã tour',
            'ma_doi_tac'          => 'Đối tác',
            'ten_tour'            => 'Tên tour',
            'gia_tour'            => 'Giá khởi hành',
            'gia_khoi_hanh'       => 'Giá khởi hành',
            'mo_ta'               => 'Mô tả',
            'hinh_anh_dai_dien'   => 'Hình ảnh đại diện',
            'so_ngay'             => 'Số ngày',
            'so_nguoi_toi_da'     => 'Số người tối đa',
            'trang_thai_duyet'    => 'Trạng thái duyệt',
            'trang_thai_hien_thi' => 'Trạng thái hiển thị',
            'ly_do_tu_choi'       => 'Lý do từ chối',
        ];
    }
}

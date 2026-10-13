<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThemMoiDoiTacRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        if ($this->ma_doi_tac === '' || $this->ma_doi_tac === null) {
            $this->request->remove('ma_doi_tac');
        }
        if ($this->mat_khau === '' || $this->mat_khau === null) {
            $this->request->remove('mat_khau');
        }
    }

    public function rules(): array
    {
        return [
            'ma_doi_tac'         => 'nullable|string|max:50|unique:doi_tacs,ma_doi_tac',
            'ten_doi_tac'        => 'required|string|max:255',
            'ma_so_thue'         => 'nullable|string|max:50',
            'ten_nguoi_dai_dien' => 'nullable|string|max:255',
            'email'              => 'required|email|unique:doi_tacs,email',
            'mat_khau'           => 'nullable|string|min:6',
            'so_dien_thoai'      => 'nullable|string|max:20',
            'dia_chi'            => 'nullable|string|max:500',
            'is_block'           => 'nullable|integer',
            'trang_thai_duyet'   => 'nullable|string|max:50',
            'ly_do_tu_choi'      => 'nullable|string',
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
        ];
    }

    public function attributes(): array
    {
        return [
            'ma_doi_tac'         => 'Mã đối tác',
            'ten_doi_tac'        => 'Tên doanh nghiệp / Đối tác',
            'ten_nguoi_dai_dien' => 'Người đại diện',
            'email'              => 'Email',
            'mat_khau'           => 'Mật khẩu',
            'so_dien_thoai'      => 'Số điện thoại',
            'dia_chi'            => 'Địa chỉ',
            'is_block'           => 'Trạng thái khóa',
            'trang_thai_duyet'   => 'Trạng thái duyệt',
            'ly_do_tu_choi'      => 'Lý do từ chối',
        ];
    }
}

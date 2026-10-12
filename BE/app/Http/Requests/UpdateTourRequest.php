<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class UpdateTourRequest extends FormRequest
{
    /**
     * Xác định quyền thực thi request
     */
    public function authorize(): bool
    {
        return true;
    }

    /**
     * Quy tắc kiểm tra tính hợp lệ của dữ liệu đầu vào khi cập nhật tour
     */
    public function rules(): array
    {
        return [
            // Mã tour để xác định bản ghi cập nhật
            'ma_tour'             => 'nullable|string',
            'id'                  => 'nullable|string',
            // Đối tác cung cấp tour
            'ma_doi_tac'          => 'required|string|exists:doi_tacs,ma_doi_tac',
            // Tên tour du lịch
            'ten_tour'            => 'required|string|max:255',
            // Giá khởi hành / giá tour trong bảng tour_khoi_hanhs
            'gia_tour'            => 'nullable|numeric|min:0',
            'gia_khoi_hanh'       => 'nullable|numeric|min:0',
            // Mô tả chi tiết lộ trình
            'mo_ta'               => 'nullable|string',
            // Link ảnh đại diện tour
            'hinh_anh_dai_dien'   => 'nullable|string',
            // Số ngày tour
            'so_ngay'             => 'nullable|integer|min:1',
            // Số lượng khách tối đa
            'so_nguoi_toi_da'     => 'nullable|integer|min:1',
            // Trạng thái kiểm duyệt
            'trang_thai_duyet'    => 'nullable|string|max:50',
            // Trạng thái hiển thị mở bán (1: hiển thị, 0: tạm ẩn)
            'trang_thai_hien_thi' => 'nullable|integer',
            // Lý do từ chối (nếu có)
            'ly_do_tu_choi'       => 'nullable|string',
        ];
    }

    /**
     * Tùy biến thông báo lỗi xác thực
     */
    public function messages(): array
    {
        return [
            'required' => ':attribute không được để trống.',
            'string'   => ':attribute phải là chuỗi ký tự.',
            'numeric'  => ':attribute phải là định dạng số.',
            'max'      => ':attribute không được vượt quá :max ký tự.',
            'min'      => ':attribute phải có giá trị tối thiểu là :min.',
            'integer'  => ':attribute phải là số nguyên.',
            'exists'   => ':attribute không tồn tại trong hệ thống.',
        ];
    }

    /**
     * Tên hiển thị tiếng Việt của các thuộc tính
     */
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

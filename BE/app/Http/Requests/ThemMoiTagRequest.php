<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ThemMoiTagRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    protected function prepareForValidation(): void
    {
        if ($this->ma_tag === '' || $this->ma_tag === null) {
            $this->request->remove('ma_tag');
        }
    }

    public function rules(): array
    {
        return [
            'ma_tag'  => 'nullable|string|max:50|unique:tags,ma_tag',
            'ten_tag' => 'required|string|max:255',
            'mo_ta'   => 'nullable|string',
        ];
    }

    public function messages(): array
    {
        return [
            'required' => ':attribute không được để trống.',
            'string'   => ':attribute phải là chuỗi ký tự.',
            'max'      => ':attribute không được vượt quá :max ký tự.',
            'unique'   => ':attribute đã tồn tại trong hệ thống.',
        ];
    }

    public function attributes(): array
    {
        return [
            'ma_tag'  => 'Mã tag',
            'ten_tag' => 'Tên tag',
            'mo_ta'   => 'Mô tả tag',
        ];
    }
}

<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeleteChucNangRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'ma_chuc_nang' => 'nullable|string',
            'id'           => 'nullable|string',
        ];
    }
}

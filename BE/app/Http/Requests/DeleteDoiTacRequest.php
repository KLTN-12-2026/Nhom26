<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DeleteDoiTacRequest extends FormRequest
{
    public function authorize(): bool
    {
        return true;
    }

    public function rules(): array
    {
        return [
            'ma_doi_tac' => 'nullable|string',
            'id'         => 'nullable|string',
        ];
    }
}

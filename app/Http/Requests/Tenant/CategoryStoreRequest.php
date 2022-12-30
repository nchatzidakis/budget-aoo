<?php

namespace App\Http\Requests\Tenant;

use Illuminate\Foundation\Http\FormRequest;

class CategoryStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'position' => 'integer',
            'name' => 'required',
        ];
    }
}

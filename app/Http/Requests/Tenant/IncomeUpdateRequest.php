<?php

namespace App\Http\Requests\Tenant;

use Illuminate\Foundation\Http\FormRequest;

class IncomeUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return (new IncomeStoreRequest())->rules();
    }
}

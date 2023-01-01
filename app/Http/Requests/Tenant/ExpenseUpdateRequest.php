<?php

namespace App\Http\Requests\Tenant;

use Illuminate\Foundation\Http\FormRequest;

class ExpenseUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return (new ExpenseStoreRequest)->rules();
    }
}

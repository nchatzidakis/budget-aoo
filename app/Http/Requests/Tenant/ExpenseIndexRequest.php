<?php

namespace App\Http\Requests\Tenant;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class ExpenseIndexRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'account_id' => [
                Rule::exists('accounts', 'id'),
            ],
        ];
    }
}

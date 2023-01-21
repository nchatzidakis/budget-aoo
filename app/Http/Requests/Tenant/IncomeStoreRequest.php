<?php

namespace App\Http\Requests\Tenant;

use Illuminate\Foundation\Http\FormRequest;

class IncomeStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'incomeSource' => [
                'required',
            ],
            'account_id' => [
                'required',
                'exists:accounts,id',
            ],
            'transactionAmount' => [
                'required',
                'numeric',
            ],
            'paid_at' => [
                'required',
            ],
        ];
    }
}

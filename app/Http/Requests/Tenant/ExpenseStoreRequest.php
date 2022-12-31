<?php

namespace App\Http\Requests\Tenant;

use Illuminate\Foundation\Http\FormRequest;

class ExpenseStoreRequest extends FormRequest
{
    public function rules()
    {
        return [
            'category_id' => [
                'required',
                'exists:categories,id'
            ],
            'account_id' => [
                'required',
                'exists:accounts,id'
            ],
            'transactionAmount' => [
                'required',
                'numeric'
            ],
            'paid_at' => 'required',
        ];
    }
}

<?php

namespace App\Http\Requests\Tenant;

use Illuminate\Foundation\Http\FormRequest;

class TransferStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'source_account_id' => [
                'required',
                'exists:accounts,id',
            ],
            'destination_account_id' => [
                'required',
                'exists:accounts,id',
            ],
            'transactionAmount' => [
                'required',
                'numeric',
            ],
            'transferred_at' => [
                'required',
            ],
        ];
    }
}

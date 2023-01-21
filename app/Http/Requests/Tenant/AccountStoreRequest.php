<?php

namespace App\Http\Requests\Tenant;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class AccountStoreRequest extends FormRequest
{
    public function rules(): array
    {
        return [
            'name' => [
                'required',
            ],
            'institution' => [
                'required',
            ],
            'type' => [
                'required',
                Rule::in(array_keys(config('custom.account.type'))),
            ],
            'currency' => [
                'required',
                Rule::in(array_keys(config('custom.app.currency'))),
            ],
            'initialBalance' => [
                'required',
                'numeric',
            ],
        ];
    }
}

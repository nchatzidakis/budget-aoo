<?php

namespace App\Http\Requests\Tenant;

use Illuminate\Foundation\Http\FormRequest;

class TransferUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return (new TransferStoreRequest())->rules();
    }
}

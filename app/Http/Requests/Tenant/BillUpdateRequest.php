<?php

namespace App\Http\Requests\Tenant;

use Illuminate\Foundation\Http\FormRequest;

class BillUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return (new BillStoreRequest)->rules();
    }
}

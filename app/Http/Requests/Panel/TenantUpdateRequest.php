<?php

namespace App\Http\Requests\Panel;

use Illuminate\Foundation\Http\FormRequest;

class TenantUpdateRequest extends FormRequest
{
    public function rules(): array
    {
        return (new TenantStoreRequest())->rules();
    }
}

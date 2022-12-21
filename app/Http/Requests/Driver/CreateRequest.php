<?php

namespace App\Http\Requests\Driver;

use Illuminate\Http\Request;

class CreateRequest extends Request
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string']
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}

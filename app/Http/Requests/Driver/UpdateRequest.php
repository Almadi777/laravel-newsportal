<?php

namespace App\Http\Requests\Driver;

use Illuminate\Http\Request;

class UpdateRequest extends Request
{
    public function rules(): array
    {
        return [
            'name' => ['string']
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}

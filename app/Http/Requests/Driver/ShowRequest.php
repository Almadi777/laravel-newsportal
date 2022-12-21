<?php

namespace App\Http\Requests\Driver;

use Illuminate\Http\Request;

class ShowRequest extends Request
{
    public function rules(): array
    {
        return [];
    }

    public function authorize(): bool
    {
        return true;
    }
}

<?php

namespace App\Http\Requests\Vehicle;

use Illuminate\Http\Request;

class DeleteRequest extends Request
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
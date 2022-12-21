<?php

namespace App\Http\Requests\Vehicle;

use App\Enums\VehicleStatus;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CreateRequest extends Request
{
    public function rules(): array
    {
        return [
            'name' => ['required', 'string'],
            'driver_id' => ['required', 'integer', 'exists:drivers,id'],
            'status_id' => ['required', Rule::in(collect(VehicleStatus::cases())->map(fn($status) => $status->value)->toArray())],
            'short_name' => ['string'],
            'inventory_number' => ['required', 'string']
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}

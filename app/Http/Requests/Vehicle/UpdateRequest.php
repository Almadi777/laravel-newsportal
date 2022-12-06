<?php

namespace App\Http\Requests\Vehicle;

use App\Enums\VehicleStatus;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class UpdateRequest extends Request
{
    public function rules(): array
    {
        return [
            'name' => ['string'],
            'driver_id' => ['integer', 'exists:drivers,id'],
            'status_id' => [Rule::in(collect(VehicleStatus::cases())->map(fn($status) => $status->value)->toArray())],
            'short_name' => ['string'],
            'inventory_number' => ['string']
        ];
    }

    public function authorize(): bool
    {
        return true;
    }
}

<?php

namespace App\Repositories\Providers;

use App\Models\Vehicle;
use App\Repositories\Contracts\DriverRepositoryContract;
use Illuminate\Database\Eloquent\Model;

final class VehicleRepository implements DriverRepositoryContract
{
    public function create(array $data): Model
    {
        return Vehicle::create($data);
    }

    public function update(int $id, array $data): Model
    {
        $driver = Vehicle::find($id);

        $driver->fill($data);

        $driver->save();

        return $driver;
    }

    public function delete(int $id): void
    {
        $driver = Vehicle::find($id);

        $driver->delete();
    }

    public function get(int $id): Model
    {
        return Vehicle::find();
    }

    public function getAll(): array
    {
        return Vehicle::all()->toArray();
    }
}

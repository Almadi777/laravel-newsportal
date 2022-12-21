<?php

namespace App\Repositories\Providers;

use App\Models\Driver;
use App\Repositories\Contracts\DriverRepositoryContract;
use Illuminate\Database\Eloquent\Model;

final class DriverRepository implements DriverRepositoryContract
{
    public function create(array $data): Model
    {
        return Driver::create($data);
    }

    public function update(int $id, array $data): Model
    {
        $driver = Driver::find($id);

        $driver->fill($data);

        $driver->save();

        return $driver;
    }

    public function delete(int $id): void
    {
        $driver = Driver::find($id);

        $driver->delete();
    }

    public function get(int $id): Model
    {
        return Driver::find();
    }

    public function getAll(): array
    {
        return Driver::all()->toArray();
    }
}

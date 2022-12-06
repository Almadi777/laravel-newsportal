<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Model;

interface VehicleRepositoryContract {
    public function create(): Model;

    public function update(): Model;

    public function delete(): void;

    public function get(): Model;

    public function getAll(): array;
}

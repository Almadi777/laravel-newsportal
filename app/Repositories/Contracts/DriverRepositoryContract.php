<?php

namespace App\Repositories\Contracts;

use Illuminate\Database\Eloquent\Model;

interface DriverRepositoryContract {
    public function create(array $data): Model;

    public function update(int $id, array $data): Model;

    public function delete(int $id): void;

    public function get(int $id): Model;

    public function getAll(): array;
}

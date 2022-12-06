<?php

namespace App\UseCases\Vehicles;

use App\Repositories\Providers\VehicleRepository;
use App\UseCases\UseCaseContract;
use App\UseCases\UseCaseResult;

class ShowVehiclesUseCase implements UseCaseContract
{
    private VehicleRepository $vehicleRepository;

    public function __construct(VehicleRepository $vehicleRepository)
    {
        $this->vehicleRepository = $vehicleRepository;
    }

    public function __invoke(array $data): UseCaseResult
    {
        $driver = $this->vehicleRepository->get($data['id']);

        return new UseCaseResult(
            isSuccess: true,
            content: $driver->toArray()
        );
    }
}

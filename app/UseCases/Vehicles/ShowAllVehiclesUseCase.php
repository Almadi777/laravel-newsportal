<?php

namespace App\UseCases\Vehicles;

use App\Repositories\Providers\VehicleRepository;
use App\UseCases\UseCaseContract;
use App\UseCases\UseCaseResult;

final class ShowAllVehiclesUseCase implements UseCaseContract
{
    private VehicleRepository $vehicleRepository;

    public function __construct(VehicleRepository $vehicleRepository)
    {
        $this->vehicleRepository = $vehicleRepository;
    }

    public function __invoke(array $data): UseCaseResult
    {
        $all = $this->vehicleRepository->getAll();

        return new UseCaseResult(
            isSuccess: true,
            content: $all
        );
    }
}

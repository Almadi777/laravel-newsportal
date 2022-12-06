<?php

namespace App\UseCases\Drivers;

use App\Repositories\Providers\DriverRepository;
use App\UseCases\UseCaseContract;
use App\UseCases\UseCaseResult;

final class ShowAllDriverUseCase implements UseCaseContract
{
    private DriverRepository $driverRepository;

    public function __construct(DriverRepository $driverRepository)
    {
        $this->driverRepository = $driverRepository;
    }

    public function __invoke(array $data): UseCaseResult
    {
        $all = $this->driverRepository->getAll();

        return new UseCaseResult(
            isSuccess: true,
            content: $all
        );
    }
}

<?php

namespace App\UseCases\Drivers;

use App\Repositories\Providers\DriverRepository;
use App\UseCases\UseCaseContract;
use App\UseCases\UseCaseResult;

final class DeleteDriverUseCase implements UseCaseContract
{
    private DriverRepository $driverRepository;

    public function __construct(DriverRepository $driverRepository)
    {
        $this->driverRepository = $driverRepository;
    }

    public function __invoke(array $data): UseCaseResult
    {
        $this->driverRepository->delete($data['id']);

        return new UseCaseResult(
            isSuccess: true,
            content: []
        );
    }
}

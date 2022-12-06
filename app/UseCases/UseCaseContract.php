<?php

namespace App\UseCases;

interface UseCaseContract {
    public function __invoke(array $data): UseCaseResult;
}

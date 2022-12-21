<?php

namespace App\Http\Controllers;

use App\Http\Requests\Driver\CreateRequest;
use App\Http\Requests\Driver\DeleteRequest;
use App\Http\Requests\Driver\ShowAllRequest;
use App\Http\Requests\Driver\UpdateRequest;
use App\UseCases\Drivers\CreateDriverUseCase;
use App\UseCases\Drivers\DeleteDriverUseCase;
use App\UseCases\Drivers\ShowAllDriverUseCase;
use App\UseCases\Drivers\ShowDriverUseCase;
use App\UseCases\Drivers\UpdateDriverUseCase;
use Illuminate\Http\JsonResponse;

class DriversController extends Controller
{
    public function index(ShowAllRequest $request): JsonResponse
    {
        /** @var ShowAllDriverUseCase $useCase */
        $useCase = app(ShowAllDriverUseCase::class);

        $useCaseResult = $useCase($request->validated());

        return response()->json($useCaseResult->content);
    }

    public function show(UpdateRequest $request): JsonResponse
    {
        /** @var ShowDriverUseCase $useCase */
        $useCase = app(ShowDriverUseCase::class);

        $useCaseResult = $useCase($request->validated());

        return response()->json($useCaseResult->content);
    }

    public function store(CreateRequest $request): JsonResponse
    {
        /** @var CreateDriverUseCase $useCase */
        $useCase = app(CreateDriverUseCase::class);

        $useCaseResult = $useCase($request->validated());

        return response()->json($useCaseResult->content);
    }

    public function update(UpdateRequest $request): JsonResponse
    {
        /** @var UpdateDriverUseCase $useCase */
        $useCase = app(UpdateDriverUseCase::class);

        $useCaseResult = $useCase($request->validated());

        return response()->json($useCaseResult->content);
    }

    public function destroy(DeleteRequest $request): JsonResponse
    {
        /** @var DeleteDriverUseCase $useCase */
        $useCase = app(DeleteDriverUseCase::class);

        $useCaseResult = $useCase($request->validated());

        return response()->json($useCaseResult->content);
    }
}

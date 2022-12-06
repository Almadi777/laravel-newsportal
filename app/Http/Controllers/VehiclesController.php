<?php

namespace App\Http\Controllers;

use App\Http\Requests\Vehicle\CreateRequest;
use App\Http\Requests\Vehicle\DeleteRequest;
use App\Http\Requests\Vehicle\ShowAllRequest;
use App\Http\Requests\Vehicle\ShowRequest;
use App\Http\Requests\Vehicle\UpdateRequest;
use App\UseCases\Vehicles\CreateVehiclesUseCase;
use App\UseCases\Vehicles\DeleteVehiclesUseCase;
use App\UseCases\Vehicles\ShowAllVehiclesUseCase;
use App\UseCases\Vehicles\ShowVehiclesUseCase;
use App\UseCases\Vehicles\UpdateVehiclesUseCase;
use Illuminate\Http\JsonResponse;

class VehiclesController extends Controller
{
    public function index(ShowAllRequest $request): JsonResponse
    {
        /** @var ShowAllVehiclesUseCase $useCase */
        $useCase = app(ShowAllVehiclesUseCase::class);

        $useCaseResult = $useCase($request->validated());

        return response()->json($useCaseResult->content);
    }

    public function show(ShowRequest $request): JsonResponse
    {
        /** @var ShowVehiclesUseCase $useCase */
        $useCase = app(ShowVehiclesUseCase::class);

        $useCaseResult = $useCase($request->validated());

        return response()->json($useCaseResult->content);
    }

    public function store(CreateRequest $request): JsonResponse
    {
        /** @var CreateVehiclesUseCase $useCase */
        $useCase = app(CreateVehiclesUseCase::class);

        $useCaseResult = $useCase($request->validated());

        return response()->json($useCaseResult->content);
    }

    public function update(UpdateRequest $request): JsonResponse
    {
        /** @var UpdateVehiclesUseCase $useCase */
        $useCase = app(UpdateVehiclesUseCase::class);

        $useCaseResult = $useCase($request->validated());

        return response()->json($useCaseResult->content);
    }

    public function destroy(DeleteRequest $request): JsonResponse
    {
        /** @var DeleteVehiclesUseCase $useCase */
        $useCase = app(DeleteVehiclesUseCase::class);

        $useCaseResult = $useCase($request->validated());

        return response()->json($useCaseResult->content);
    }
}

<?php

namespace App\Http\Controllers;

use App\Repository\PropertyAnalyticsRepository;
use App\Repository\PropertyRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\CreatePropertyRequest;
use App\Http\Requests\AssignAnalyticToPropertyRequest;
use Illuminate\Http\Request;
use Illuminate\Http\Response;

class PropertyController extends Controller
{
    private $propertyRepository;

    public function __construct(PropertyRepository $propertyRepository)
    {
        $this->propertyRepository = $propertyRepository;
    }

    /**
     * @param CreatePropertyRequest $request
     * @return JsonResponse
     */
    public function create(CreatePropertyRequest $request)
    {
        return response()->json($this->propertyRepository->create($request->all()));
    }

    /**
     * @param AssignAnalyticToPropertyRequest $request
     * @param $id
     * @return JsonResponse
     */
    public function assignAnalytic($id, AssignAnalyticToPropertyRequest $request)
    {
        try {
            $this->propertyRepository->attachAnalytic($request->all(), $id);
            return response()->json('Success!', Response::HTTP_OK);
        } catch (Exception $e) {
            return response()->json('Something went wrong', Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * @param $id
     * @param AssignAnalyticToPropertyRequest $request
     * @return JsonResponse
     */
    public function update($id, AssignAnalyticToPropertyRequest $request)
    {
        try {
            $this->propertyRepository->updateAttachedAnalytic($request->all(), $id);
            return response()->json('Success!', Response::HTTP_OK);
        } catch (Exception $e) {
            return response()->json('Something went wrong', Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * @param $id
     * @return JsonResponse
     */
    public function show($id)
    {
        try {
            return response()->json($this->propertyRepository->getAnalytic($id));
        } catch (Exception $e) {
            return response()->json('Something went wrong', Response::HTTP_BAD_REQUEST);
        }
    }

    /**
     * @param Request $request
     * @param PropertyAnalyticsRepository $propertyAnalyticsRepository
     * @return JsonResponse
     */
    public function index(Request $request, PropertyAnalyticsRepository $propertyAnalyticsRepository)
    {
        try {
            $ids = $this->propertyRepository->getIdsByCondition($request->all());
            return response()->json($propertyAnalyticsRepository->getSummery($ids));
        } catch (Exception $e) {
            return response()->json('Something went wrong', Response::HTTP_BAD_REQUEST);
        }
    }
}

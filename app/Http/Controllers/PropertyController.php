<?php

namespace App\Http\Controllers;

use App\Repository\PropertyAnalyticsRepository;
use App\Repository\PropertyRepository;
use Exception;
use Illuminate\Http\JsonResponse;
use App\Http\Requests\CreatePropertyRequest;
use App\Http\Requests\AssignAnalyticToPropertyRequest;
use Illuminate\Http\Request;

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
    public function create( CreatePropertyRequest $request )
    {
        if (isset($request->validator) && $request->validator->fails()) {
            return response()->json($request->validator->messages(), 400);
        }
        return response()->json($this->propertyRepository->create($request->all()));
    }

    /**
     * @param AssignAnalyticToPropertyRequest $request
     * @param $id
     * @return JsonResponse
     */
    public function assignAnalytic($id, AssignAnalyticToPropertyRequest $request)
    {
        if (isset($request->validator) && $request->validator->fails()) {
            return response()->json($request->validator->messages(), 400);
        }
        try {
            $this->propertyRepository->attachAnalytic($request->all(), $id);
            return response()->json('Success!', 400);
        } catch (Exception $e) {
            return response()->json('Something went wrong', 404);
        }
    }

    /**
     * @param $id
     * @param AssignAnalyticToPropertyRequest $request
     * @return JsonResponse
     */
    public function updateAssignAnalytic($id, AssignAnalyticToPropertyRequest $request)
    {
        if (isset($request->validator) && $request->validator->fails()) {
            return response()->json($request->validator->messages(), 400);
        }
        try {
            $this->propertyRepository->updateAttachedAnalytic($request->all(), $id);
            return response()->json('Success!', 400);
        } catch (Exception $e) {
            return response()->json('Something went wrong', 403);
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
            return response()->json('Something went wrong', 403);
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
            return response()->json('Something went wrong', 403);
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActivityRequest;
use App\Http\Resources\ActivityResource;
use App\Http\Response\ApiResponseBuilder;
use App\Services\ActivityService;
use Illuminate\Http\Request;

/**
 * Class ActivityController
 * @package App\Http\Controllers
 */
class ActivityController extends Controller
{
    /**
     * @var ActivityService
     */
    private $activityService;

    /**
     * ActivityController constructor.
     * @param ActivityService $activityService
     */
    public function __construct(ActivityService $activityService)
    {
        $this->activityService = $activityService;
    }

    /**
     * @param ActivityRequest $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function createActivity(ActivityRequest $request)
    {
        $request = collect($request->validated());
        $this->activityService->create($request);

        return ApiResponseBuilder::success();
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllActivities(Request $request)
    {
        return ApiResponseBuilder::successWithData(ActivityResource::collection($this->activityService->getAll()));
    }

    /**
     * @param Request $request
     * @return \Illuminate\Http\JsonResponse
     */
    public function getAllActivitiesByUser(Request $request)
    {
        return ApiResponseBuilder::successWithData(
            ActivityResource::collection(auth()->user()->activities()->with('activityType')->get())
        );
    }
}

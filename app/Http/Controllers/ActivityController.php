<?php

namespace App\Http\Controllers;

use App\Http\Requests\ActivityRequest;
use App\Http\Response\ApiResponseBuilder;
use App\Services\ActivityService;

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

}

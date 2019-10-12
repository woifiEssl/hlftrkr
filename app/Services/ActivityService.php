<?php

namespace App\Services;

use App\Exceptions\Auth\LoginException;
use App\Models\Activity as ActivityModel;
use App\Models\Customer as CustomerModel;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Hash;

/**
 * Class ActivityService
 */
class ActivityService
{
    /**
     * @var ActivityModel
     */
    private $activityModel;

    /**
     * ActivityService constructor.
     * @param ActivityModel $activityModel
     */
    public function __construct(ActivityModel $activityModel)
    {
        $this->activityModel = $activityModel;
    }

    /**
     * @param Collection $collection
     */
    public function create(Collection $collection)
    {
        $activity = new ActivityModel($collection->toArray());
        $activity->user_id = auth()->user()->id;
        $activity->save();
    }

    /**
     * @return ActivityModel[]|\Illuminate\Database\Eloquent\Collection
     */
    public function getAll()
    {
        return $this->activityModel->with('activityType')->get();
    }



}

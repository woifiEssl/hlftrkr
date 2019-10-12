<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/**
 * Class ActivityResource
 * @package App\Http\Resources
 */
class ActivityResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param Request $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'name' => $this->name,
            'value' => $this->name,
            'from' => $this->from,
            'to' => $this->from,
            'type' => new ActivityTypeResource($this->whenLoaded('activityType')),
        ];
    }

}

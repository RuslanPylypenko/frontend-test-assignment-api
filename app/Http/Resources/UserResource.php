<?php

namespace App\Http\Resources;

use Carbon\Carbon;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
{

    public function toArray($request)
    {
        return [
            'id' => $this->id,
            'name' => $this->name,
            "email" => $this->email,
            "phone" => $this->phone,
            "position" => new PositionResource($this->whenLoaded('position')),
            "position_id" => $this->position_id,
            "registration_timestamp" => Carbon::make($this->created_at)->timestamp,
            "photo" => $this->getPhoto()
        ];
    }
}

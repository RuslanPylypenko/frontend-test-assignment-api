<?php


namespace App\Http\Resources;


use Illuminate\Http\Resources\Json\ResourceCollection;

class PositionCollection extends ResourceCollection
{
    public function toArray($request)
    {
        return [
            'success' => true,
            'positions' => $this->collection
        ];
    }
}

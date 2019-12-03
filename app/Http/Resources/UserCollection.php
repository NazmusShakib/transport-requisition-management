<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;

class UserCollection extends ResourceCollection
{
    public $collects = UserResource::class;

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function toArray($request)
    {
        return parent::toArray($request);
    }

    /**
     * Get additional data that should be returned with the resource array.
     *
     * @param  \Illuminate\Http\Request $request
     * @return array
     */
    public function with($request)
    {
        return [
            "current_page" => $this->currentPage(),
            "from" => $this->firstItem(),
            "last_page" => $this->lastPage(),
            "path" => $this->currentPage(),
            "per_page" => $this->perPage(),
            "to" => $this->lastItem(),
            "total" => $this->total()
        ];
    }
}

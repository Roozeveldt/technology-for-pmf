<?php

namespace App\Http\Resources\Admin;

use App\Models\Admin\Brand;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

/** @mixin Brand */
class BrandResource extends JsonResource
{
    /**
     * @param Request $request
     * @return array
     */
    public function toArray( $request )
    : array
    {
        return [
            'id'      => $this->id,
            'code'    => $this->code,
            'title'   => $this->title,
            'formats' => FormatResource::collection($this->formats),
        ];
    }
}

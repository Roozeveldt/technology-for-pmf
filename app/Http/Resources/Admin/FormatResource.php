<?php

namespace App\Http\Resources\Admin;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class FormatResource extends JsonResource
{
	/**
	 * @param Request $request
	 * @return array
	 */
	public function toArray( $request )
	{
		return [
            'id' => $this->id,
            'code' => $this->code,
            'title' => $this->title,
		];
	}
}

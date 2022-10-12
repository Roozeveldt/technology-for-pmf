<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\FormatRequest;
use App\Http\Resources\Admin\FormatResource;
use App\Models\Admin\Format;

class FormatsController extends Controller
{
	public function index()
	{
		$formats = Format::all();
        return FormatResource::collection($formats);
	}

	public function store( FormatRequest $request )
	{
        $format = Format::create($request->validated());
        return new FormatResource($format);
	}

	public function show( Format $format )
	{
        return new FormatResource($format);
	}

	public function update( FormatRequest $request, Format $format )
	{
        $format->update($request->validated());
        return new FormatResource($format);
	}

	public function destroy( Format $format )
	{
        $format->delete();
        return response()->noContent();
	}
}

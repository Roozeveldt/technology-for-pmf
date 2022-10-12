<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Resources\Admin\LineResource;
use App\Models\Admin\Line;
use App\Http\Requests\Admin\LineRequest;

class LinesController extends Controller
{
    public function index()
    {
        $lines = Line::all();
        return LineResource::collection($lines);
    }

    public function store( LineRequest $request )
    {
        $data = $request->validated();
        $line = Line::create($data);

        return new LineResource($line);
    }

    public function show( Line $line )
    {
        return new LineResource($line);
    }

    public function update( Line $line, LineRequest $request )
    {
        $line->update($request->validated());
        return new LineResource($line);
    }

    public function destroy( Line $line )
    {
        $line->delete();
        return response()->noContent();
    }
}

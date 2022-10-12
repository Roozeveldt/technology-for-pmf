<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Brand\StoreRequest;
use App\Http\Requests\Admin\Brand\UpdateRequest;
use App\Http\Resources\Admin\BrandResource;
use App\Models\Admin\Brand;

class BrandsController extends Controller
{
	public function index()
	{
        $brands = Brand::all();
        return BrandResource::collection($brands);
	}

	public function store( StoreRequest $request )
	{
        $data = $request->validated();
        $brand = Brand::create($data);

        return new BrandResource($brand);
	}

	public function show( Brand $brand )
	{
        return new BrandResource($brand);
	}

	public function update( Brand $brand, UpdateRequest $request )
	{
        $data = $request->validated();
        dd($data);
//        $brand->update($data);
//        $brand->formats()->sync($data['formats']);
//
//        return new BrandResource($brand);
	}

	public function destroy( Brand $brand )
	{
        $brand->delete();
        return response()->noContent();
	}
}

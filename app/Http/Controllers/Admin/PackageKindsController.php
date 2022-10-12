<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\PackageKindRequest as Request;
use App\Http\Resources\Admin\PackageKindResource as Resource;
use App\Models\Admin\PackageKind;

class PackageKindsController extends Controller
{
	public function index()
	{
        $packages = PackageKind::all();
        return Resource::collection($packages);
	}

    public function store( Request $request )
    {
        $package = PackageKind::create($request->validated());
        return new Resource($package);
    }

	public function show( PackageKind $package )
	{
        return new Resource($package);
	}

	public function update( Request $request, PackageKind $package )
	{
        $package->update($request->validated());
        return new Resource($package);
	}

	public function destroy( PackageKind $package )
	{
        $package->delete();
        return response()->noContent();
	}
}

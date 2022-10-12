<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Admin\Employee;
use App\Http\Requests\Admin\EmployeeStoreRequest as StoreRequest;
use App\Http\Requests\Admin\EmployeeUpdateRequest as UpdateRequest;
use App\Http\Resources\Admin\EmployeeResource as Resource;
use Illuminate\Support\Facades\Hash;

class EmployeesController extends Controller
{
	public function index()
	{
        $employees = Employee::all();
        return Resource::collection($employees);
	}

    public function store( StoreRequest $request )
    {
        $data = $request->validated();
        $data['password'] = Hash::make($request->password);
        $employee = Employee::create($data);

        return new Resource($employee);
    }

	/*public function show( Employee $employee )
	{
	}

	public function update( Request $request, Employee $employee )
	{
	}

	public function destroy( Employee $employee )
	{
	}*/
}

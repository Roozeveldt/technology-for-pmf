<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\EmployeeStoreRequest as StoreRequest;
use App\Http\Requests\Admin\EmployeeUpdateRequest as UpdateRequest;
use App\Http\Resources\Admin\EmployeeResource as Resource;
use App\Models\User;
use Illuminate\Support\Facades\Hash;

class UsersController extends Controller
{
	public function index()
	{
		$users = User::all();
        return Resource::collection($users);
	}

	public function store( StoreRequest $request )
	{
        $user = User::create($request->validated());
        return new Resource($user);
	}

	public function show( User $user )
	{
        return new Resource($user);
	}

	public function update( UpdateRequest $request, User $user )
	{
        $data = $request->validated();

        $this->validate($request, [
            'password' => $request->password !== null
                ? 'sometimes|required|string'
                : '',
        ]);

        if ($request->password !== null) {
            $data['password'] = Hash::make($request->password);
        } else {
            unset($data['password']);
        }

        $user->update($data);

        return new Resource($user);
	}

	public function destroy( User $user )
	{
        $user->delete();
        return response()->noContent();
	}
}

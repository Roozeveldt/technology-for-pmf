<?php

namespace App\Http\Requests\Admin;

use Illuminate\Validation\Rule;

class EmployeeUpdateRequest extends EmployeeStoreRequest
{
    public function rules()
    : array
    {
        $rules = parent::rules();

        $rules['phone'] = [
            'required',
            'string',
            'max:18',
            Rule::unique('users', 'phone')->ignore($this->id),
        ];

        $rules['password'] = [];

        return $rules;

    }

    public function authorize()
    : bool
    {
        return true;
    }
}

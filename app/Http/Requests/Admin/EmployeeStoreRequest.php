<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class EmployeeStoreRequest extends FormRequest
{
    public function rules()
    : array
    {
        return [
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['nullable', 'string', 'email', 'max:255'],
            'phone'    => ['required', 'string', 'max:18', 'unique:employees,phone'],
            'position' => ['required', 'string'],
            'role'     => ['required', 'integer', Rule::in(['10', '15', '20'])],
            'password' => ['required', 'string'],
        ];
    }

    public function authorize()
    : bool
    {
        return true;
    }
}

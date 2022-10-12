<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class PackageKindRequest extends FormRequest
{
	public function rules()
	: array
	{
		return [
            'code' => [
                'required',
                'max:5',
                Rule::unique('packages', 'code')->ignore($this->id),
            ],
            'title' => 'required',
            'description' => 'required',
		];
	}

	public function authorize()
	: bool
	{
		return true;
	}
}

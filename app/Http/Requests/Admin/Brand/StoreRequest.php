<?php

namespace App\Http\Requests\Admin\Brand;

use Illuminate\Foundation\Http\FormRequest;

class StoreRequest extends FormRequest
{
	public function rules()
	: array
	{
		return [
            'code' => [
                'required',
                'unique:brands,code',
            ],
            'title' => 'required',
		];
	}

	public function authorize()
	: bool
	{
		return true;
	}
}

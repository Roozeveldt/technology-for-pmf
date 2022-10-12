<?php

namespace App\Http\Requests\Admin\Brand;

use Illuminate\Validation\Rule;

class UpdateRequest extends StoreRequest
{
	public function rules()
	: array
	{
        $rules = parent::rules();

        $rules['code'] = [
            'required',
            Rule::unique('brands', 'code')->ignore($this->id),
        ];

        $rules['formats'] = ['required', 'array'];

        return $rules;
	}

	public function authorize()
	: bool
	{
		return true;
	}
}

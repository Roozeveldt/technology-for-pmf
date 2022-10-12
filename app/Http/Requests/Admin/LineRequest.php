<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class LineRequest extends FormRequest
{
	public function rules()
	: array
	{
        return [
            'title' => 'required',
            'description' => 'required',
        ];
	}

    public function attributes()
    : array
    {
        return [
            'title' => 'Название линии',
            'description' => 'Описание линии',
        ];
    }

    public function authorize()
	: bool
	{
		return true;
	}
}

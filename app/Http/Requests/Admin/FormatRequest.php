<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;
use Illuminate\Validation\Rule;

class FormatRequest extends FormRequest
{
    public function rules()
    : array
    {
        return [
            'code' => [
                'required',
                'max:3',
                Rule::unique('formats', 'code')->ignore($this->id),
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

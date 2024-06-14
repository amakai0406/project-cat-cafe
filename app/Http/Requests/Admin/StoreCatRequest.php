<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreCatRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'image' => [

            ],
            'breed' => 'required|string',
            'gender' => 'required|int',
            'date_of_birth' => 'required|string',
            'introduction' => 'required|string',
        ];
    }
}



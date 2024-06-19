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
                'required',
                'image',
                'mimes:jpeg,png,jpg,gif,svg',
                'max:2048',
            ],
            'breed' => 'required|string|max:255',
            'gender' => 'required|integer|in:0,1',
            'date_of_birth' => 'required|date',
            'introduction' => 'required|string|max:1000',
        ];
    }
}



<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreFaqRequest extends FormRequest
{
    public function authorize()
    {
        //全てのリクエストを許可する
        return true;
    }

    public function rules()
    {
        //どちらも入力を必須とし、文字列の255m文字までと設定
        return [
            'question' => 'required|string|max:255',
            'answer' => 'required|string|max:255',
        ];
    }
}



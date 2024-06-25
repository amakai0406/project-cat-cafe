<?php

namespace App\Http\Requests\Admin;

use Illuminate\Foundation\Http\FormRequest;

class StoreFacilityRequest extends FormRequest
{

    //authorize メソッドは、リクエストを認可する true: リクエストを常に許可します。false: リクエストを拒否します。
    //どんなユーザーからのリクエストでも通過することが許可されます
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'name' => 'required|string|max:100',
            'image' => [
                'required',
                'image',
                //許可されるファイル形式
                'mimes:jpeg,png,jpg,gif,svg',
                //ファイルサイズの最大値
                'max:2048',
            ],
            'description' => 'required|string|max:100',
            //date: このフィールドは有効な日付である必要があります。
            'installed_at' => 'required|date',
        ];
    }
}



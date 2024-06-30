<?php

namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class ContactRequest extends FormRequest
{
    /**
     * Determine if the user is authorized to make this request.
     */

    // authorizeメソッドはクエストが認可されているかどうかを決定する
    public function authorize(): bool
    {
        //全てのユーザーがこのリクエストを実行できる
        return true;
    }

    /**
     *  the validation rules that apply to the request.
     *
     * @return array<string, \Illuminate\Contracts\Validation\ValidationRule|array<mixed>|string>
     */

    //リクエストに適用されるバリデーションルールを定義
    public function rules(): array
    {
        return [
            //requiredは必須　nullableは任意　stringは文字列　
            'name' => ['required', 'string', 'max:255'],
            'name_kana' => ['required', 'string', 'max:255', 'regex:/^[ァ-ロワンヴー]*$/u'],//ァからロ、ワ、ン、ヴ、ー $は文字列の末尾　uはUnicodeモード
            'phone' => ['nullable', 'regex:/^0(\d-?\d{4}|\d{2}-?\d{3}|\d{3}-?\d{2}|\d{4}-?\d|\d0-?\d{4})-?\d{4}$/'],
            'email' => ['required', 'email'],
            'body' => ['required', 'string', 'max:2000'],
        ];
    }

    //validation.phpで
    //'attributes' => [
    //'name' => '名前',
    //'name_kana' => 'お名前(フリガナ)',
    //'phone' => '電話番号',
    //'email' => 'メールアドレス',
    //'body' => '本文']

    //カスタム属性名
    public function attributes()
    {
        return [
            //'body'　本文=>'お問い合わせ内容'と言う表示に変更しユーザーにわかりや明日異様にしている
            'body' => 'お問い合わせ内容'
        ];
    }

    public function messages()
    {
        return [
            //validation.phpでは
            //'regex' => ':attributeには、有効な正規表現を指定してください。',
            //phoneのバリデーションによるデフォルトのメッセージではわかりづらいため
            //電話番号の形式が間違っている場合に具体的なメッセージが表示
            'phone.regex' => ':attributeを正しく入力してください'
        ];
    }
}

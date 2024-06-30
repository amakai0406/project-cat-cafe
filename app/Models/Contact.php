<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Contact extends Model
{
    use HasFactory, Notifiable;

    //$fillableプロパティの設定→マスアサインメント（mass assignment）を許可する属性のリスト
    //マスアサインメントのコードなどでも意図しない属性へ値を渡さない
    protected $fillable = [
        'name',
        'name_kana',
        'phone',
        'email',
        'body',
        'received_date',
        'created_at'
    ];
}
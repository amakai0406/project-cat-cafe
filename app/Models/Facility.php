<?php

//名前空間は、クラス名の衝突を避けるために使用
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Facility extends Model
{
    use HasFactory;

    //installed_atというカラムがある為、モデル内でタイムスタンプの自動管理を無効
    public $timestamps = false;

    //マスアサインメント可能な属性の定義
    //all()で全カラムを取得して変数の格納し、compact()で渡す際など
    protected $fillable = [
        'name',
        'image',
        'description',
        'installed_at'
    ];

}

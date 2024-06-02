<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Blog extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'body', 'image'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function cats()
    {
        return $this->belongsToMany(Cat::class)->withTimestamps();
    }

    public function blogs()
    {
        $blogs = Blog::all();

        return view('admin.blogs.index')->with('blogs', $blogs);

        // viewのファイルまでのパスは以下の設定です
        // プロジェクト¥resources¥views¥user¥index.blade.php

        // return view の引数にはビューが格納されているフォルダ名と
        // viewのファイル名を拡張子などを省略して記述します

        // withメソッドはビューへ変数の情報を個別で渡すことができます
        // 開くviewに対して -> withメソッドで変数情報を渡します。
        // withメソッドの引数は次のようになります
        // ('viewファイルで使いたい変数の名前','$テーブル情報を代入した変数')
    }
}

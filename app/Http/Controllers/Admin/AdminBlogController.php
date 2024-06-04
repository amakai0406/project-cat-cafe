<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreBlogRequest;
use App\Http\Requests\Admin\UpdateBlogRequest;
use App\Models\Category;
use App\Models\Blog;
use App\Models\cat;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class AdminBlogController extends Controller
{
    //ブログ一覧画面
    public function index(Request $request)
    {
        $categories = Category::all();
        $users = User::all();
        $updatedFrom = $request->input('updatedFrom');
        $updatedUntil = $request->input('updatedUntil');
        $createdFrom = $request->input('createdFrom');
        $createdUntil = $request->input('createdUntil');
        $blogs = Blog::latest('updated_at')->simplePaginate(10);
        return view('admin.blogs.index', compact('blogs', 'categories', 'updatedFrom', 'updatedUntil', 'createdFrom', 'createdUntil'));
    }

    //ブログ投稿画面
    public function create()
    {
        return view('admin.blogs.create');
    }


    //ブログ投稿処理
    public function store(StoreBlogRequest $request)
    {
        $userId = auth()->user()->id;

        $savedImagePath = $request->file('image')->store('blogs', 'public');

        $blog = new Blog($request->validated());
        $blog->image = $savedImagePath;
        $blog->user_id = $userId;
        $blog->save();

        return to_route('admin.blogs.index')->with('success', 'ブログを投稿しました');

    }

    //ブログの検索処理

    public function search(Request $request)
    {

        $keyword = $request->input('keyword');
        $categoryId = $request->input('category_id');
        $updatedFrom = $request->input('updated_from');
        $updatedUntil = $request->input('updated_until');
        $createdFrom = $request->input('created_from');
        $createdUntil = $request->input('created_until');

        $blogs = Blog::query();

        if (!empty($keyword)) {
            $blogs->where('title', 'LIKE', "%{$keyword}%");
        }

        if (!empty($categoryId)) {
            $blogs->where('category_id', $categoryId);
        }

        if (!empty($updatedFrom) && !empty($updatedUntil)) {
            $blogs->whereBetween(Blog::raw('DATE(updated_at)'), [$updatedFrom, $updatedUntil]);
        }

        if (!empty($createdFrom) && !empty($createdUntil)) {
            $blogs->whereBetween(Blog::raw('DATE(created_at)'), [$createdFrom, $createdUntil]);
        }

        $categories = Category::all();

        $blogs = $blogs->latest('updated_at')->simplePaginate(10);

        return view('admin.blogs.index', compact('blogs', 'categories', 'updatedFrom', 'updatedUntil', 'createdFrom', 'createdUntil'));

    }



    public function show(Request $request, string $id)
    {
        //
    }

    //指定したIDのブログ編集画面
    public function edit(Blog $blog)
    {
        $categories = Category::all();
        $cats = Cat::all();
        return view('admin.blogs.edit', [
            'blog' => $blog,
            'categories' => $categories,
            'cats' => $cats
        ]);
    }

    //指定したIDのプログラム更新処理
    public function update(UpdateBlogRequest $request, string $id)
    {
        $blog = Blog::findOrFail($id);
        $updateData = $request->validated();

        //画像を変更する場合
        if ($request->has('image')) {
            //変更前の画像を削除
            Storage::disk('public')->delete($blog->image);
            //変更後の画像をアップロード、保存パスを更新対象データにセット
            $updateData['image'] = $request->file('image')->store('blogs', 'public');
        }
        $blog->category()->associate($updateData['category_id']);
        $blog->update($updateData);
        $blog->cats()->sync($updateData['cats'] ?? []);

        return to_route('admin.blogs.index')->with('success', 'ブログを更新しました');
    }

    //指定したIDのブログの削除処理
    // public function destroy(string $id)
    // {
    //     $blog = Blog::findOrFail($id);
    //     $blog->delete();
    //     Storage::disk('public')->delete($blog->image);

    //     return to_route('admin.blogs.index')->with('success', 'ブログを削除しました');
    // }

    public function destroy(string $id)
    {
        $blog = Blog::findOrFail($id);
        $imagePath = $blog->image;

        $blog->delete();
        Storage::disk('public')->delete($imagePath);

        return redirect()->route('admin.blogs.index')->with('success', 'ブログを削除しました');
    }

}

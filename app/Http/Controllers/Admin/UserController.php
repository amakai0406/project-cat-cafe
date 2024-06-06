<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUserRequest;
use App\Http\Requests\Admin\UpdateBlogRequest;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
    }

    //　ユーザ登録画面の表示
    public function create()
    {
        return view('admin.users.create');
    }

    //ユーザ登録処理
    public function store(StoreUserRequest $request)
    {
        $validated = $request->validated();
        $validated['image'] = $request->file('image')->store('users', 'public');
        $validated['password'] = Hash::make($validated['password']);
        User::create($validated);

        return back()->with('success', 'ユーザを登録しました');
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request)
    {
        $request->session()->forget('errors');
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(User $user)
    {
        return view('admin/users/edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateBlogRequest $request, string $id)
    {

        $user = User::findOrFail($id);
        //$updateData = $request->validated();
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->save();

        //画像を変更する場合
        if ($request->has('image')) {
            //変更前の画像を削除
            Storage::disk('public')->delete($user->image);
            //変更後の画像をアップロード、保存パスを更新対象データにセット
            $updateData['image'] = $request->file('image')->store('users', 'public');
        }
        //$user->update($updateData);

        return redirect()->route('admin.users.index')->with('success', 'ユーザーが更新されました。');
    }


    /**
     * Remove the specified resource from storage.
     */
    public function destroy(User $user)
    {
        //
    }
}

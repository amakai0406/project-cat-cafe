<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreUserRequest;
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
        // $validated = $request->validated();
        $validated['image'] = $request->file('image')->store('users', 'public');
        $validated['password'] = Hash::make($validated['password']);
        User::create($validated);

        return back()->with('success', 'ユーザを登録しました');
    }

    public function show(Request $request)
    {
        $request->session()->forget('errors');
    }


    public function edit(User $user)
    {
        return view('admin/users/edit', ['user' => $user]);
    }


    public function update(Request $request, User $user)
    {
        $user->name = $request->input('name');
        $user->introduction = $request->input('introduction');
        $user->email = $request->input('email');

        //画像を変更する場合
        if ($request->file('image')) {
            //変更前の画像を削除
            Storage::disk('public')->delete($user->image);
            //変更後の画像をアップロード、保存パスを更新対象データにセット
            $user->image = $request->file('image')->store('users', 'public');
        }

        //$user->image = $request->file('image');
        $user->save();

        return redirect()->route('admin.users.edit', ['user' => $user->id])->with('success', 'ユーザーが更新されました。');
    }



    public function destroy(User $user)
    {
        //
    }
}

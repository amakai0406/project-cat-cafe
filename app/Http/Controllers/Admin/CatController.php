<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\StoreCatRequest;
use App\Models\Cat;
use Illuminate\Http\Request;

class CatController extends Controller
{
    public function index(Request $request)
    {
        $cats = Cat::all();
        $cats = Cat::orderBy('created_at', 'desc')->get();

        return view('admin.cats.index', compact('cats'));

    }

    public function create()
    {
        $cat = new Cat();
        return view('admin.cats.create', compact('cat'));
    }

    public function store(StoreCatRequest $request)
    {
        $validated = $request->validated();
        $validated['image'] = $request->file('image')->store('cats', 'public');

        Cat::create($validated);

        return to_route('admin.cats.index')->with('success', '新しいねこを登録しました');
    }
}




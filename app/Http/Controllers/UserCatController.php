<?php

namespace App\Http\Controllers;

use App\Models\Blog;
use Illuminate\Http\Request;
use App\Models\Cat;

class UserCatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //メソッドで'created_at'を'desc'(降順)としてcatsテーブルの全レコードを取得
        $cats = Cat::orderBy('created_at', 'desc')->get();

        //戻り値は、$catsを渡したcats.indexページ
        //$catsを渡すことで、cats.indexページで$catsを使用することができる
        return view('cats.index', compact('cats'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     */
    public function show(Blog $blog)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Blog $blog)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Blog $blog)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Blog $blog)
    {
        //
    }
}

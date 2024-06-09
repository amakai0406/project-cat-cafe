<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\cat;
use Illuminate\Http\Request;

class CatController extends Controller
{
    public function index(Request $request)
    {
        $cats = Cat::all();

        return view('admin.cats.index', compact('cats'));
        //compact(' compact', 'breed', 'gender', 'dateOfBirth', 'image', 'introduction', 'createdId', 'updatedAt')

    }

}




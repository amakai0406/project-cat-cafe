<?php

namespace App\Http\Controllers;

use App\Models\Menu;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return view('menus.index');
    }

}

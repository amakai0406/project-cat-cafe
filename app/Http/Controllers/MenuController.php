<?php

namespace App\Http\Controllers;

use App\Models\Menu;

class MenuController extends Controller
{
    public function index()
    {
        //戻り値は、viewヘルパーでviewファイルのmenus.index
        return view('menus.index');
    }

}

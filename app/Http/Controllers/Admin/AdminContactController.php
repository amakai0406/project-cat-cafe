<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Contact;

class AdminContactController extends Controller
{
    public function index()
    {
        //全レコードの取得
        $contacts = Contact::all();

        //お問合せ一覧の表示　compactメソッド 'contacts' => $contacts　をビューに渡している
        return view('admin.contacts.index', compact('contacts'));
    }

}

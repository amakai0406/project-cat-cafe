<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactAdminMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index(Request $request)
    {
        $contacts = Contact::all();

        return view('admin.contacts.index', compact('contacts'));
    }

    public function show()
    {
        $contacts = Contact::all();
        return view('contacts.index', compact('contacts'));
    }

    function sendMail(ContactRequest $request)
    {
        $validated = $request->validated();

        $contact = new Contact();

        $contact->name = $validated['name'];
        $contact->name_kana = $validated['name_kana'];
        $contact->phone = $validated['phone'];
        $contact->email = $validated['email'];
        $contact->body = $validated['body'];

        $contact->save();

        // これ以降の行は入力エラーがなかった場合のみ実行されます
        // 登録処理(実際はメール送信などを行う)
        Mail::to('amakaiamakai0406@gmail.com')->send(new ContactAdminMail($validated));
        return to_route('contact.complete');
    }

    public function complete()
    {
        return view('contacts.complete');
    }
}

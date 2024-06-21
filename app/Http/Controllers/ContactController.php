<?php

namespace App\Http\Controllers;

use App\Http\Requests\ContactRequest;
use App\Mail\ContactAdminMail;
use Illuminate\Support\Facades\Mail;
use App\Models\Contact;

class ContactController extends Controller
{
    public function index()
    {
        //お問い合わせ画面の表示
        return view('contacts.index');
    }

    public function show()
    {
        //
    }

    function sendMail(ContactRequest $request)
    {
        //ContactRequestから送られてきた値を検証
        $validated = $request->validated();

        //インスタンスの作成
        $contact = new Contact();

        //作成したインスタンスに渡って来たデータを各プロパティに格納(検証済みのデータ)
        $contact->name = $validated['name'];
        $contact->name_kana = $validated['name_kana'];
        $contact->phone = $validated['phone'];
        $contact->email = $validated['email'];
        $contact->body = $validated['body'];

        //データべすに保存
        $contact->save();

        // 登録処理(実際はメール送信などを行う)
        //保存されたデータは、ContactAdminMailインスタンスが作成され、amakaiamakai0406@gmail.comに送信される
        Mail::to('amakaiamakai0406@gmail.com')->send(new ContactAdminMail($validated));
        //リダイレクトでcontacts.completeへ
        //Route::get('/contact/complete', [ContactController::class, 'complete'])->name('contacts.complete');↓
        return redirect()->route('contacts.complete');
    }

    public function complete()
    {
        //登録完了ページを表示
        return view('contacts.complete');
    }
}

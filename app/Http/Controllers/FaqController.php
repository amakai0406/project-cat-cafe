<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\StoreFaqRequest;
use App\Models\Faq;

class FaqController extends Controller
{
    public function index()
    {
        //faqsテーブルの全レコードを取得し、格納
        $faqs = Faq::all();

        //viewのfaqs.indexにfaqsを渡し、そのビューを返す
        return view('faqs.index', compact('faqs'));
    }

    public function create()
    {
        //インスタンスの作成
        $faq = new Faq;

        //viewのadmin.faqs.indexに$fqsを渡し、そのビューを返す
        return view('admin.faqs.create', compact('faq'));
    }

    public function store(StoreFaqRequest $request)
    {
        //StoreFaqRequestで設定したルールを通ったリクエストを$validatedに格納する
        $validated = $request->validated();
        //$validatedのデータを元にFaqモデルを作成する
        Faq::create($validated);

        //作成画面に戻し、新しい質問を追加しましたとメッセージを表示する
        return back()->with('success', '新しい質問を追加しました');
    }
}

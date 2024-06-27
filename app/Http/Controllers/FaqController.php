<?php

namespace App\Http\Controllers;

use App\Http\Requests\Admin\StoreFaqRequest;
use App\Models\Faq;

class FaqController extends Controller
{
    public function index()
    {
        $faqs = Faq::all();

        return view('faqs.index', compact('faqs'));
    }

    public function create()
    {
        $faq = new Faq;

        return view('admin.faqs.create', compact('faq'));
    }

    public function store(StoreFaqRequest $request)
    {
        $validated = $request->validated();
        Faq::create($validated);

        return back()->with('success', '新しい質問を追加しました');
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use App\Http\Requests\Admin\StoreFacilityRequest;

class FacilityController extends Controller
{
    public function index()
    {
        //Facility=facilitiesでテーブルの全レコードをallメソッドで取得して$facilitiesに格納し、
        //compactメソッドで$facilitiesをviewのfacilities.indexに渡して返している
        $facilities = Facility::all();
        return view('facilities.index', compact('facilities'));
    }

    public function create()
    {
        //Facilityモデルのインスタンスを作成し
        //viewのadmin.facilities.createにfacilityを渡し、表示している
        $facility = new Facility;
        return view('admin.facilities.create', compact('facility'));
    }

    //StoreFacilityRequestによって設定されたルールでリクエストをバリデーションする
    public function store(StoreFacilityRequest $request)
    {
        //バリデーションバリデーションされたリクエストを$validatedに格納する
        $validated = $request->validated();
        //リクエストで送信された画像ファイルをstoreメソッドでpublicのfacilitiesに保存する
        //storeメソッドの戻り値は保存したファイルのパスなのでそのパスを$validated['image'] に格納する
        $validated['image'] = $request->file('image')->store('facilities', 'public');

        //createメソッドによってfacilitiesテーブルに$validatedに格納されたデータがレコードとして作成されます
        Facility::create($validated);

        //元の作成画面にもどし、新しい設備を追加しましたとメッセージが出る
        return back()->with('success', '新しい設備を追加しました');
    }
}
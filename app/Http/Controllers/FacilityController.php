<?php

namespace App\Http\Controllers;

use App\Models\Facility;
use App\Http\Requests\Admin\StoreFacilityRequest;

class FacilityController extends Controller
{
    public function index()
    {
        $facilities = Facility::all();
        return view('facilities.index', compact('facilities'));
    }

    public function create()
    {
        $facility = new Facility;
        return view('admin.facilities.create', compact('facility'));
    }

    public function store(StoreFacilityRequest $request)
    {
        $validated = $request->validated();
        $validated['image'] = $request->file('image')->store('facilities', 'public');

        Facility::create($validated);

        return back()->with('success', '新しい設備を追加しました');
    }
}
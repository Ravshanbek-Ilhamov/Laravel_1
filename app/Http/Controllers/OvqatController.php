<?php

namespace App\Http\Controllers;

use App\Models\Massalliq;
use App\Models\Ovqat;
use Illuminate\Http\Request;

class OvqatController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $ovqat = Ovqat::all();
        return view('foodWork.ovqat',['ovqatlar' => $ovqat]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $massalliqlar = Massalliq::all();
        return view('foodWork.food_create',['massalliqlar' => $massalliqlar]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
    //      dd($request->all());
       $request->validate([
        'name' => 'required|max:255',
        'ids' => 'array',
       ]);

       $data = $request->all();
       $ids = $data['ids'];
       unset($data['ids']);
       $ovqat = Ovqat::create($data);
    //    dd($ovqat);
       $ovqat->massalliq()->attach($ids);

       return back();

    }

    /**
     * Display the specified resource.
     */
    public function show(Ovqat $ovqat)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Ovqat $ovqat)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Ovqat $ovqat)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Ovqat $ovqat)
    {
        //
    }
}

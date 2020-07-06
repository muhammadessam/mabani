<?php

namespace App\Http\Controllers;

use App\UnitType;
use Illuminate\Http\Request;

class UnitTypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('unitTypes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required'
        ], [], [
            'name' => 'الاسم'
        ]);
        UnitType::create($request->all());
        $this->actionDone();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param \App\UnitType $unitType
     * @return \Illuminate\Http\Response
     */
    public function show(UnitType $unitType)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\UnitType $unitType
     * @return \Illuminate\Http\Response
     */
    public function edit(UnitType $unitType)
    {
        return view('unitTypes.edit', compact('unitType'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\UnitType $unitType
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, UnitType $unitType)
    {
        $request->validate([
            'name' => 'required',
        ], [], [
            'name' => 'الاسم'
        ]);
        $unitType->update($request->all());
        $this->actionDone();
        return redirect()->route('unit-types.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\UnitType $unitType
     * @return \Illuminate\Http\Response
     */
    public function destroy(UnitType $unitType)
    {
        $unitType->delete();
        $this->actionDone();
        return  redirect()->back();
    }
}

<?php

namespace App\Http\Controllers;

use App\Unit;
use Illuminate\Http\Request;

class UnitController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('units.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
        return view('units.create');
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
            'name' => 'required',
            'water_account' => 'required',
            'electricity_account' => 'required',
            'unit_type_id' => 'required|exists:unit_types,id',
            'floor_id' => 'required|exists:floors,id',
            'building_id' => 'required|exists:buildings,id',
        ], [], [
            'name' => 'الاسم',
            'water_account' => 'حساب المياة',
            'electricity_account' => 'حساب الكهرباء',
            'unit_type_id' => 'نوع الوحدة',
            'floor_id' => 'الطابق',
            'building_id' => 'المبني',
        ]);
        Unit::create($request->all());
        $this->actionDone();
        return redirect()->route('units.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Unit $unit
     * @return \Illuminate\Http\Response
     */
    public function show(Unit $unit)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Unit $unit
     * @return \Illuminate\Http\Response
     */
    public function edit(Unit $unit)
    {
        return view('units.edit', compact('unit'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Unit $unit
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Unit $unit)
    {
        $request->validate([
            'name' => 'required',
            'water_account' => 'required',
            'electricity_account' => 'required',
            'unit_type_id' => 'required|exists:unit_types,id',
            'floor_id' => 'required|exists:floors,id',
            'building_id' => 'required|exists:buildings,id',
        ], [], [
            'name' => 'الاسم',
            'water_account' => 'حساب المياة',
            'electricity_account' => 'حساب الكهرباء',
            'unit_type_id' => 'نوع الوحدة',
            'floor_id' => 'الطابق',
            'building_id' => 'المبني',
        ]);
        $unit->update($request->all());
        $this->actionDone();
        return redirect()->route('units.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Unit $unit
     * @return \Illuminate\Http\Response
     */
    public function destroy(Unit $unit)
    {
        //
    }
}

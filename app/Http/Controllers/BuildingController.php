<?php

namespace App\Http\Controllers;

use App\Building;
use Illuminate\Http\Request;

class BuildingController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('buildings.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('buildings.create');
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
            'gov_id' => 'required|exists:govs,id',
            'state_id' => 'required|exists:states,id',
            'block_number' => 'required',
            'plot_number' => 'required',
        ], [], [
            'gov_id'=>'المحافظة',
            'state_id'=>'الولاية',
            'block_number'=>'رقم المربع',
            'plot_number'=>'رقم القطعة',
        ]);
        if ($request->hasFile('img_temp'))
            $request['img'] = $this->storeFile('Buildings', 'img_temp');
        Building::create($request->except('img_temp'));
        $this->actionDone();
        return redirect()->route('buildings.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Building $building
     * @return \Illuminate\Http\Response
     */
    public function show(Building $building)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Building $building
     * @return \Illuminate\Http\Response
     */
    public function edit(Building $building)
    {
        return view('buildings.edit', compact('building'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Building $building
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Building $building)
    {
        $request->validate([
            'gov_id' => 'required|exists:govs,id',
            'state_id' => 'required|exists:states,id',
            'block_number' => 'required',
            'plot_number' => 'required',
        ], [], [
            'gov_id'=>'المحافظة',
            'state_id'=>'الولاية',
            'block_number'=>'رقم المربع',
            'plot_number'=>'رقم القطعة',
        ]);
        if ($request->hasFile('img_temp'))
            $request['img'] = $this->storeFile('Buildings', 'img_temp');
        $building->update($request->except('img_temp'));
        $this->actionDone();
        return redirect()->route('buildings.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Building $building
     * @return \Illuminate\Http\Response
     */
    public function destroy(Building $building)
    {
        $building->delete();
        $this->actionDone();
        return redirect()->back();
    }
}

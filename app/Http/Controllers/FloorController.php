<?php

namespace App\Http\Controllers;

use App\Floor;
use Illuminate\Http\Request;

class FloorController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('floors.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

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
            'floor' => 'required',
        ], [], [
            'floor' => 'الطابق'
        ]);
        Floor::create($request->all());
        $this->actionDone();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Floor $floor
     * @return \Illuminate\Http\Response
     */
    public function show(Floor $floor)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Floor $floor
     * @return \Illuminate\Http\Response
     */
    public function edit(Floor $floor)
    {
        return view('floors.edit', compact('floor'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Floor $floor
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Floor $floor)
    {
        $request->validate([
            'floor' => 'required',
        ]);
        $floor->update($request->all());
        $this->actionDone();
        return redirect()->route('floors.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Floor $floor
     * @return \Illuminate\Http\Response
     */
    public function destroy(Floor $floor)
    {
        $floor->delete();
        $this->actionDone();
        return redirect()->back();
    }
}

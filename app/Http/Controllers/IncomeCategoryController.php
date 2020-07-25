<?php

namespace App\Http\Controllers;

use App\IncomeCategory;
use Illuminate\Http\Request;

class IncomeCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data = IncomeCategory::all();
        return view('income_category.index', compact('data'));
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
            'name' => 'required',
        ], [], [
            'name' => 'الاسم'
        ]);
        IncomeCategory::create($request->all());
        $this->actionDone();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param \App\IncomeCategory $category
     * @return \Illuminate\Http\Response
     */
    public function show(IncomeCategory $category)
    {
    }


    public function edit(IncomeCategory $category)
    {
        return view('income_category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\IncomeCategory $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, IncomeCategory $category)
    {

        $request->validate([
            'name' => 'required',
        ], [], [
            'name' => 'الاسم'
        ]);
        $category->update($request->all());
        $this->actionDone();
        return redirect()->route('income.category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\IncomeCategory $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(IncomeCategory $category)
    {
        $category->delete();
        $this->actionDone();
        return redirect()->back();
    }
}

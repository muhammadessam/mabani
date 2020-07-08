<?php

namespace App\Http\Controllers;

use App\Income;
use Illuminate\Http\Request;

class IncomeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('incomes.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('incomes.create');
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
            'cat_id' => 'required|exists:income_categories,id',
            'building_id' => 'required|exists:buildings,id',
            'unit_id' => 'required|exists:buildings,id',
            'date' => 'required|date',
            'amount' => 'required',
            'paid' => 'required',
        ], [], [
            'cat_id' => 'نوع الدخل',
            'building_id' => 'المبني',
            'unit_id' => 'الوحدة',
            'date' => 'التاريخ',
            'amount' => 'القيمة',
            'paid' => 'الدفع',
        ]);
        $request['balance'] = $request['amount'] - $request['paid'];
        Income::create($request->all());
        $this->actionDone();
        return redirect()->route('income.income.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Income $income
     * @return \Illuminate\Http\Response
     */
    public function show(Income $income)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Income $income
     * @return \Illuminate\Http\Response
     */
    public function edit(Income $income)
    {
        return view('incomes.edit', compact('income'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Income $income
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Income $income)
    {

        $request->validate([
            'cat_id' => 'required|exists:income_categories,id',
            'building_id' => 'required|exists:buildings,id',
            'unit_id' => 'required|exists:buildings,id',
            'date' => 'required|date',
            'amount' => 'required',
            'paid' => 'required',
        ], [], [
            'cat_id' => 'نوع الدخل',
            'building_id' => 'المبني',
            'unit_id' => 'الوحدة',
            'date' => 'التاريخ',
            'amount' => 'القيمة',
            'paid' => 'الدفع',
        ]);
        $request['balance'] = $request['amount'] - $request['paid'];
        $income->update($request->all());
        $this->actionDone();
        return redirect()->route('income.income.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Income $income
     * @return \Illuminate\Http\Response
     */
    public function destroy(Income $income)
    {
        $income->delete();
        $this->actionDone();
        return redirect()->back();
    }
}

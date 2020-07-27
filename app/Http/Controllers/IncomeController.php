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
    public function index(Request $request)
    {
        $data = Income::all();
        if($request['start']){
            $data  = $data->where('date', '>=' , $request['start']);
        }
        if($request['end']){
            $data  = $data->where('date', '<=' , $request['end']);
        }

        if($request['employee_id']){
            $data  = $data->where('employee_id', $request['employee_id']);
        }

        if($request['building_id']){
            $data  = $data->where('building_id', $request['building_id']);
        }

        if($request['unit_id']){
            $data  = $data->where('unit_id', $request['unit_id']);
        }
        return view('incomes.index', compact('data'));
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
            'date' => 'required|date',
            'amount' => 'required',
            'paid' => 'required',
        ], [], [
            'cat_id' => 'نوع الدخل',
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
            'date' => 'required|date',
            'amount' => 'required',
            'paid' => 'required',
        ], [], [
            'cat_id' => 'نوع الدخل',
            'date' => 'التاريخ',
            'amount' => 'القيمة',
            'paid' => 'الدفع',
        ]);
        $request['building_id'] = $request['building_id'] ??  null;
        $request['unit_id'] = $request['unit_id'] ?? null;
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


    public function print(Request $request, Income $income)
    {
        return view('incomes.print', compact('income'));
    }
}

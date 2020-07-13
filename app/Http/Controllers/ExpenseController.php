<?php

namespace App\Http\Controllers;

use App\Expense;
use Illuminate\Http\Request;

class ExpenseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('expenses.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('expenses.create');
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
            'cat_id' => 'required|exists:expenses_categories,id',

            'date' => 'required|date',
            'amount' => 'required',
            'paid' => 'required',
        ], [], [
            'cat_id' => 'نوع المصروف',

            'date' => 'التاريخ',
            'amount' => 'القيمة',
            'paid' => 'الدفع',
        ]);
        $request['balance'] = $request['amount'] - $request['paid'];
        Expense::create($request->all());
        $this->actionDone();
        return redirect()->route('expenses.expense.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Expense $expense
     * @return \Illuminate\Http\Response
     */
    public function show(Expense $expense)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Expense $expense
     * @return \Illuminate\Http\Response
     */
    public function edit(Expense $expense)
    {
        return view('expenses.edit', compact('expense'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Expense $expense
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Expense $expense)
    {

        $request->validate([
            'cat_id' => 'required|exists:expenses_categories,id',
            'building_id' => 'required|exists:buildings,id',
            'unit_id' => 'required|exists:buildings,id',
            'employee_id' => 'required|exists:employees,id',
            'date' => 'required|date',
            'amount' => 'required',
            'paid' => 'required',
        ], [], [
            'cat_id' => 'نوع المصروف',
            'building_id' => 'المبني',
            'unit_id' => 'الوحدة',
            'employee_id' => 'الموظف',
            'date' => 'التاريخ',
            'employee_id' => 'الموظف',
            'amount' => 'القيمة',
            'paid' => 'الدفع',
        ]);
        $request['balance'] = $request['amount'] - $request['paid'];
        $expense->update($request->all());
        $this->actionDone();
        return redirect()->route('expenses.expense.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Expense $expense
     * @return \Illuminate\Http\Response
     */
    public function destroy(Expense $expense)
    {
        $expense->delete();
        $this->actionDone();
        return redirect()->back();
    }
}

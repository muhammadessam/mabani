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
    public function index(Request $request)
    {
        $data = Expense::all();
        if ($request['start']) {
            $data = $data->where('date', '>=', $request['start']);
        }
        if ($request['end']) {
            $data = $data->where('date', '<=', $request['end']);
        }

        if ($request['employee_id']) {
            $data = $data->where('employee_id', $request['employee_id']);
        }

        if ($request['building_id']) {
            $data = $data->where('building_id', $request['building_id']);
        }

        if ($request['unit_id']) {
            $data = $data->where('unit_id', $request['unit_id']);
        }
        if ($request['owner_id']) {
            $data = $data->where('owner_id', $request['owner_id']);
        }
        if ($request['expenses_cat']) {
            $data = $data->where('cat_id', $request['expenses_cat']);
        }
        return view('expenses.index', compact('data'));
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

            'date' => 'required|date',
            'amount' => 'required',
            'paid' => 'required',
        ], [], [
            'cat_id' => 'نوع المصروف',
            'date' => 'التاريخ',
            'amount' => 'القيمة',
            'paid' => 'الدفع',
        ]);
        $request['building_id'] = $request['building_id'] ?? null;
        $request['unit_id'] = $request['unit_id'] ?? null;
        $request['employee_id'] = $request['employee_id'] ?? null;
        $request['owner_id'] = $request['owner_id'] ?? null;
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


    public function print(Request $request, Expense $expense)
    {
        return view('expenses.print', compact('expense'));
    }
}

<?php

namespace App\Http\Controllers;

use App\ExpensesCategory;
use Illuminate\Http\Request;

class ExpensesCategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('expenses_category.index');
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
            'name' => 'required',
        ], [], [
            'name' => 'الاسم'
        ]);
        ExpensesCategory::create($request->all());
        $this->actionDone();
        return redirect()->back();
    }

    /**
     * Display the specified resource.
     *
     * @param \App\ExpensesCategory $expensesCategory
     * @return \Illuminate\Http\Response
     */
    public function show(ExpensesCategory $expensesCategory)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\ExpensesCategory $expensesCategory
     * @return \Illuminate\Http\Response
     */
    public function edit(ExpensesCategory $category)
    {
        return view('expenses_category.edit', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\ExpensesCategory $expensesCategory
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, ExpensesCategory $category)
    {
        $request->validate([
            'name' => 'required',
        ], [], [
            'name' => 'الاسم'
        ]);
        $category->update($request->all());
        $this->actionDone();
        return redirect()->route('expenses.category.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\ExpensesCategory $expensesCategory
     * @return \Illuminate\Http\Response
     */
    public function destroy(ExpensesCategory $category)
    {
        $category->delete();
        $this->actionDone();
        return redirect()->back();
    }
}

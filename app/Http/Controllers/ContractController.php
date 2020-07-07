<?php

namespace App\Http\Controllers;

use App\Contract;
use Carbon\Carbon;
use Illuminate\Http\Request;

class ContractController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('contracts.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('contracts.create');
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
            'unit_id' => 'required|exists:units,id',
            'tenant_id' => 'required|exists:tenants,id',
            'number' => 'required',
            'start' => 'required|date',
            'end' => 'required|date',
            'rent' => 'required',
            'payment_method' => 'required',
        ], [], [
            'unit_id' => 'الوحدة',
            'tenant_id' => 'المستأجر',
            'number' => 'الرقم',
            'start' => 'تاريخ البداية',
            'end' => 'تاريخ النهاية',
            'payment_method' => 'طريقة الدفع',
        ]);
        $request['period'] = Carbon::create($request['start'])->diffInMonths($request['end']);
        Contract::create($request->all());
        $this->actionDone();
        return redirect()->route('contracts.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Contract $contract
     * @return \Illuminate\Http\Response
     */
    public function show(Contract $contract)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Contract $contract
     * @return \Illuminate\Http\Response
     */
    public function edit(Contract $contract)
    {
        return view('contracts.edit', compact('contract'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Contract $contract
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Contract $contract)
    {
        $request->validate([
            'unit_id' => 'required|exists:units,id',
            'tenant_id' => 'required|exists:tenants,id',
            'number' => 'required',
            'start' => 'required|date',
            'end' => 'required|date',
            'rent' => 'required',
            'payment_method' => 'required',
        ], [], [
            'unit_id' => 'الوحدة',
            'tenant_id' => 'المستأجر',
            'number' => 'الرقم',
            'start' => 'تاريخ البداية',
            'end' => 'تاريخ النهاية',
            'rent' => 'قيمة الايجار',
            'payment_method' => 'طريقة الدفع',
        ]);
        $request['period'] = Carbon::create($request['start'])->diffInMonths($request['end']);
        $contract->update($request->all());
        $this->actionDone();
        return redirect()->route('contracts.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Contract $contract
     * @return \Illuminate\Http\Response
     */
    public function destroy(Contract $contract)
    {
        $contract->delete();
        $this->actionDone();
        return redirect()->back();
    }
}

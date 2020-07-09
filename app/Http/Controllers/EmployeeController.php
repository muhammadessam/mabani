<?php

namespace App\Http\Controllers;

use App\Employee;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class EmployeeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('emplyees.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('emplyees.create');
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
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
            'salary' => 'required',
        ], [], [
            'name' => 'الاسم',
            'email' => 'البريد',
            'password' => 'كلمة المرور',
            'salary' => 'الراتب'
        ]);

        $request['password'] = Hash::make($request['password']);
        $request['type'] = 'User';
        $user = User::create($request->all());
        $user->employee()->create([
            'salary' => $request['salary']
        ]);
        $this->actionDone();
        return redirect()->route('employees.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Employee $employee
     * @return \Illuminate\Http\Response
     */
    public function show(Employee $employee)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Employee $employee
     * @return \Illuminate\Http\Response
     */
    public function edit(Employee $employee)
    {
        return view('emplyees.edit', compact('employee'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Employee $employee
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Employee $employee)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($employee->user)],
            'salary' => 'required',
        ], [], [
            'name' => 'الاسم',
            'email' => 'البريد',
            'salary' => 'الراتب'
        ]);
        $request['password'] = $request['password'] ? Hash::make($request['password']) : $employee->user['password'];
        $employee->user->update($request->all());
        $employee->update($request->only('salary'));
        $this->actionDone();
        return redirect()->route('employees.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Employee $employee
     * @return \Illuminate\Http\Response
     */
    public function destroy(Employee $employee)
    {
        $employee->user()->delete();
        $this->actionDone();
        return redirect()->back();
    }
}

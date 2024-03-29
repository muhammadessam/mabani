<?php

namespace App\Http\Controllers;

use App\Building;
use App\Owner;
use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;

class OwnerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('owners.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('owners.create');
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
        ], [], [
            'name' => 'الاسم',
            'email' => 'البريد',
            'password' => 'كلمة المرور',
        ]);
        $request['password'] = Hash::make($request['password']);
        $request['type'] = 'User';
        $user = User::create($request->all());
        $user->owner()->create();
        $this->actionDone();
        return redirect()->route('owners.index');
    }

    /**
     * Display the specified resource.
     *
     * @param \App\Owner $owner
     * @return \Illuminate\Http\Response
     */
    public function show(Owner $owner)
    {
        return view('owners.show', compact('owner'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param \App\Owner $owner
     * @return \Illuminate\Http\Response
     */
    public function edit(Owner $owner)
    {
        return view('owners.edit', compact('owner'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param \App\Owner $owner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Owner $owner)
    {
        $request->validate([
            'name' => ['required', 'string', 'max:255'],
            'email' => ['required', 'string', 'email', 'max:255', Rule::unique('users')->ignore($owner->user)],
        ], [], [
            'name' => 'الاسم',
            'email' => 'البريد',
        ]);
        $request['password'] = $request['password'] ? Hash::make($request['password']) : $owner->user['password'];
        $owner->user->update($request->all());
        $this->actionDone();
        return redirect()->route('owners.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param \App\Owner $owner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Owner $owner)
    {
        $owner->user()->delete();
        $this->actionDone();
        return redirect()->back();
    }

    public function shareGet(Request $request)
    {

        if ($request['amount'] && $request['building_id']) {
            $building = Building::find($request['building_id']);
            foreach ($building->owners as $owner) {
                $ownersShare[$owner['id']][]= $owner->pivot->percentage;
                $ownersShare[$owner['id']][]= ($owner->pivot->percentage/100) * $request['amount'];
            }
            return view('owners.share', compact('ownersShare'));
        }
        return view('owners.share');
    }
}

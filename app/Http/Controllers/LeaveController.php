<?php

namespace App\Http\Controllers;

use App\Models\Leave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class LeaveController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $leaves = Auth::user()->leaves;
        return view('leaves.manage')->with('leaves', $leaves);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        return view('leaves.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name' => 'required|min:4',
            'description' => 'required|min:4',
        ]);
        $request->merge([
            'user_id' => Auth::id(),
        ]);
        Leave::create($request->all());
        return redirect()->route('leaves.create')->with('success', 'create successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Leave $leave)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($leaf)
    {
        //
        $leave = Leave::findOrFail($leaf)->first();
        if ($leave->user_id == Auth::id()) {
            return view('leaves.edit')->with('leave', $leave);
        }
        return redirect()->back();
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Leave $leave)
    {
        //
        $request->validate([
            'name' => 'required|min:4',
            'description' => 'required|min:4',
        ]);
        $leave->first()->update($request->all());
        return redirect()->route('leaves.index')->with('success','leave updated');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($leaf)
    {
        //
        Leave::destroy($leaf);
        return redirect()->route('leaves.index')->with('success','leave daleted');
    }
}

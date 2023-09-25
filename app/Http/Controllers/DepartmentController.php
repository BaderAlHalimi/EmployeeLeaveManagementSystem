<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Stream;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DepartmentController extends Controller
{

    public function getNotifications()
    {
        return Stream::where('user_id', Auth::id())->limit(10)->get();
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $departments = Department::where('user_id', Auth::id())->lazy();
        return view('admin.manage_department', compact('departments'))->with('notifications',$this->getNotifications());
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //

        return view('admin.add_department')->with('notifications', $this->getNotifications());
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->merge(['user_id' => Auth::id()]);
        $department = Department::create(
            $request->all(),
        );
        return redirect()->route('department.index')->with('success', 'Department ' . $department->short_name . ' added successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(Department $department)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Department $department)
    {
        //
        return view('admin.edit_department',compact('department'))->with('notifications',$this->getNotifications());
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Department $department)
    {
        //
        $department->update($request->all());
        return redirect()->route('department.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Department $department)
    {
        //
        $department->delete();
        return response()->json('',200);
    }
}

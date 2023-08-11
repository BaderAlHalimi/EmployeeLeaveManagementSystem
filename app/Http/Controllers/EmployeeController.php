<?php

namespace App\Http\Controllers;

use App\Models\UserLeave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class EmployeeController extends Controller
{
    //
    public function index()
    {
        return view('employee.public.index');
    }
    public function create()
    {
        $leaves = Auth::user()->manager->leaves;
        return view('employee.public.create')->with('leaves', $leaves);
    }
    public function store(Request $request)
    {
        $request->validate([
            'leaves_id' => 'required|numeric',
            'number_days' => 'required|numeric'
        ]);
        $request->merge([
            'user_id' => Auth::id(),
        ]);
        UserLeave::create($request->all());
        return redirect()->route('employee.index')->with('success', 'Leave requested');
    }
    public function view(){
        $leaves = Auth::user()->empLeaves;
        return view('employee.public.view')->with('leaves',$leaves);
    }
}

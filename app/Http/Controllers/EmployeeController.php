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
        $Leaves = count(Auth::user()->empLeaves);
        $num1 = 0;
        $num2 = 0;
        $num3 = 0;
        foreach (Auth::user()->manager->Leaves as $leave) {
            $num1 += count($leave->approved()->wherePivot('user_id',Auth::id())->get());
            $num2 += count($leave->pending()->wherePivot('user_id',Auth::id())->get());
            $num3 += count($leave->canceled()->wherePivot('user_id',Auth::id())->get());
        }
        $Approved = $num1;
        $Pending = $num2;
        $Canceled = $num3;
        return view('employee.public.index')
            ->with('Approved', $Approved)
            ->with('Leaves', $Leaves)
            ->with('Pending', $Pending)
            ->with('Canceled',$Canceled);
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

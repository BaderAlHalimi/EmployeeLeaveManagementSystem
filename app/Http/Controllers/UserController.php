<?php

namespace App\Http\Controllers;

use App\Models\Department;
use App\Models\Stream;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    function __construct()
    {
        $this->middleware(['auth', 'verified','auth.admin']);
    }
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        //
        $Employees = count(Auth::user()->employees);
        $Leaves = count(Auth::user()->leaves);
        $num1 = 0;
        $num2 = 0;
        $num3 = 0;
        $notifications = Stream::where('user_id',Auth::id())->limit(10)->get();
        foreach (Auth::user()->leaves as $leave) {
            $num1 += count($leave->approved);
            $num2 += count($leave->pending);
            $num3 += count($leave->canceled);
        }
        $Approved = $num1;
        $Pending = $num2;
        $Canceled = $num3;
        return view('admin.index')
            ->with('Approved', $Approved)
            ->with('Employees', $Employees)
            ->with('Leaves', $Leaves)
            ->with('Pending', $Pending)
            ->with('Canceled',$Canceled)
            ->with('notifications',$notifications);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
        $notifications = Stream::where('user_id',Auth::id())->limit(10)->get();
        $departments = Department::where('user_id',Auth::id())->get();
        return view('employee.create')->with('notifications',$notifications)->with('departments',$departments);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'name'      => 'required',
            'gender'    => 'required|in:male,female',
            'email'     => 'required',
            'mobile'    => 'numeric|digits_between:10,15',
            'password'  => 'required|confirmed',
        ]);
        $request->merge([
            'admin' => Auth::id(),
        ]);
        User::create($request->all());
        return redirect()->route('admin.create')->with('success', 'create successfully');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($admin)
    {
        //
        $employee = User::where('id', $admin)->first(); //select * from users where id = 8
        // dd($employee);
        if ($employee->admin == Auth::id()) {
            $notifications = Stream::where('user_id',Auth::id())->limit(10)->get();
            return view('employee.edit')->with('employee', $employee)->with('notifications',$notifications);
        } else {
            return redirect()->back();
        }
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $admin)
    {
        //
        $request->validate([
            'name'      => 'required',
            'gender'    => 'required|in:male,female',
            'email'     => 'required',
            'mobile'    => 'numeric|digits_between:10,15',
            'password'  => 'required|confirmed',
        ]);
        // dd($request->all());
        $employee = User::where('id', $admin)->first(); //select * from users where id = 8
        if ($employee->admin == Auth::id()) {
            $employee->update($request->all());
            return redirect()->route('admin.manage');
        } else {
            return redirect()->back();
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($admin)
    {
        //
        User::destroy($admin);
        return redirect()->route('admin.manage');
    }
    public function manage()
    {
        $employees = Auth::user()->employees;
        $notifications = Stream::where('user_id',Auth::id())->limit(10)->get();

        return view('employee.manage')->with('employees', $employees)->with('notifications',$notifications);
    }
    protected function isAdmin()
    {
        if (Auth::check()) {
            $user = Auth::user();
            if ($user->admin) {
                return redirect()->route('employee.index');
            }
        }
    }
}

<?php

namespace App\Http\Controllers;

use App\Models\UserLeave;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserLeaveController extends Controller
{
    //
    public function index()
    {
        $leaves = Auth::user()->leaves;
        $users = array();
        $i = 0;

        foreach ($leaves as $leave) {
            foreach ($leave->users as $user) {
                $users[$i] = $user;
                $users[$i]['leave_name'] = $leave->name;
                $i++;
            }
        }
        return view('leaves.userLeaves.index')->with('users', $users);
    }
    public function accept($id)
    {
        $tmp = UserLeave::where('id', $id)->first();
        $tmp->update(['status' => 'approved']);
        return redirect()->back()->with('success', 'accepted');
    }
    public function cancele(Request $request,$id)
    {
        $tmp = UserLeave::where('id', $id)->first();
        $tmp->update(['status' => 'canceled','reason'=>$request->reason]);
        return redirect()->back()->with('success', 'canceled');
    }
    public function accepted()
    {
        //
        $leaves = Auth::user()->leaves;
        $users = array();
        $i = 0;

        foreach ($leaves as $leave) {
            foreach ($leave->approved as $user) {
                $users[$i] = $user;
                $users[$i]['leave_name'] = $leave->name;
                $i++;
            }
        }
        return view('leaves.userLeaves.index')->with('users', $users);
    }
    public function pending()
    {
        $leaves = Auth::user()->leaves;
        $users = array();
        $i = 0;

        foreach ($leaves as $leave) {
            foreach ($leave->pending as $user) {
                $users[$i] = $user;
                $users[$i]['leave_name'] = $leave->name;
                $i++;
            }
        }
        return view('leaves.userLeaves.index')->with('users', $users);
    }
    public function canceled()
    {
        $leaves = Auth::user()->leaves;
        $users = array();
        $i = 0;

        foreach ($leaves as $leave) {
            foreach ($leave->canceled as $user) {
                $users[$i] = $user;
                $users[$i]['leave_name'] = $leave->name;
                $i++;
            }
        }
        return view('leaves.userLeaves.index')->with('users', $users);
    }
}

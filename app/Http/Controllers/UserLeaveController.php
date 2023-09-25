<?php

namespace App\Http\Controllers;

use App\Events\UserLeaveAccepted;
use App\Events\UserLeaveCancelled;
use App\Models\Stream;
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
        $notifications = Stream::where('user_id',Auth::id())->limit(10)->get();
        return view('leaves.userLeaves.index')->with('users', $users)->with('notifications',$notifications);
    }
    public function accept($id)
    {
        $tmp = UserLeave::where('id', $id)->first();
        $tmp->update(['status' => 'approved']);
        event(new UserLeaveAccepted($tmp));
        return redirect()->back()->with('success', 'accepted');
    }
    public function cancele(Request $request,$id)
    {
        $tmp = UserLeave::where('id', $id)->first();
        $tmp->update(['status' => 'canceled','reason'=>$request->reason]);
        event(new UserLeaveCancelled($tmp));
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
        $notifications = Stream::where('user_id',Auth::id())->limit(10)->get();
        return view('leaves.userLeaves.index')->with('users', $users)->with('notifications',$notifications);
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
        $notifications = Stream::where('user_id',Auth::id())->limit(10)->get();
        return view('leaves.userLeaves.index')->with('users', $users)->with('notifications',$notifications);
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
        $notifications = Stream::where('user_id',Auth::id())->limit(10)->get();
        return view('leaves.userLeaves.index')->with('users', $users)->with('notifications',$notifications);
    }
}

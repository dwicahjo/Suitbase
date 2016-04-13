<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Leave;
use App\Http\Controllers\Auth\AuthController;
use DB;
class LeavesController extends Controller
{
    public function create(Request $request)
    {
        $this->validate ($request, [
            'startdate' => 'required|date|after:today',
            'enddate' => 'required|date|after:startdate'
            ]);

        $leave = new Leave;

        $leave->date_start = $request->startdate;
        $leave->date_end = $request->enddate;
        $leave->type = $request->leavetype;
        $leave->description = $request->reason;
        $leave->status = "Submitted";
        $leave->employees_id = $request->user()->id;

        $leave->save();

        return back();
    }

    public function viewListof ()
    {
     /*     $leaves = Leave::paginate(15);*/
     $leaves = DB::table('leaves')
     ->join('users', 'employees_id', '=', 'users.id')
     ->join('divisions','users.divisions_id','=','divisions.id')
     ->select('leaves.*','divisions.name as division', 'users.name as username')
     ->orderBy('leaves.created_at','desc')
     ->get();
     return view('pages.leave.listOfLeave', ['leaves' => $leaves]);

 }

 public function viewDetails ($id)
 {
    $leaves = Leave::where('id', $id)->get();
    $leaves = DB::table('leaves')
    ->join('users', 'employees_id', '=', 'users.id')
    ->join('divisions','users.divisions_id','=','divisions.id')
    ->select('leaves.*','divisions.name as division', 'users.name as username')
    ->where('leaves.id',$id)
    ->get();

    return view('pages.leave.leaveapproval', ['leaves' => $leaves]);
}

public function viewMyList ()
{
    $user_id = \Auth::user()->id;
    $leaves = Leave::where('employees_id', $user_id)->paginate(15);

    return view('pages.leave.myLeave', ['leaves' => $leaves]);
}

public function viewMyDetails ($id)
{
    $leaves = Leave::where('id', $id)->get();

    return view('pages.leave.leaveDetails', ['leaves' => $leaves]);
}
}

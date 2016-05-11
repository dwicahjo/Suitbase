<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Leave;
use App\Http\Controllers\Auth\AuthController;
use DB;
use Session;
use Validator;

class LeavesController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function create(Request $request)
    {
        $inputDate = $request->startdate;
        $date = date("Y-m-d", strtotime('-1 day', strtotime($inputDate)));

        $messages = [
            'startdate.after' => "The start date must be later than today",
            'enddate.after' => "The end date can not be earlier than the start date",
        ];

        $rules = [
            'startdate' => 'required|date|after:yesterday',
            'enddate'   => 'required|date|after:' . $date,
            'leavetype' => 'required',
            'reason'    => 'required',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->route('leaves.create')
                        ->withErrors($validator)
                        ->withInput($request->all());
        }

        $leave = new Leave;

        $leave->date_start = $request->startdate;
        $leave->date_end = $request->enddate;
        $leave->type = $request->leavetype;
        $leave->description = $request->reason;
        $leave->status = "Submitted";
        $leave->employees_id = $request->user()->id;

        $leave->save();

        Session::flash('success', 'Leave request was submitted successfully');
        return redirect()->route('leaves.create');
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
        // $leaves = Leave::where('id', $id)->get();
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
        $leaves = Leave::where('employees_id', $user_id)->orderBy('created_at','desc')->paginate(15);

        return view('pages.leave.myLeave', ['leaves' => $leaves]);
    }

    public function viewMyDetails ($id)
    {
        $leaves = Leave::where('id', $id)->get();

        return view('pages.leave.leaveDetails', ['leaves' => $leaves]);
    }

    public function viewEdit ($id) {
        $leaves = Leave::where('id', $id)->get();

        return view('pages.leave.editleave', ['leaves' => $leaves]);
    }

    public function update (Request $request)
    {
        $leave = Leave::where('id', $request->id)->get()->first();

        $leave->date_start = $request->startdate;
        $leave->date_end = $request->enddate;
        $leave->type = $request->leavetype;
        $leave->description = $request->reason;
        $leave->employees_id = $request->user()->id;

        $leave->save();

        Session::flash('success', 'Leave request was updated successfully');
        return redirect()->route('leaves.edit', $request->id);
    }

    public function reject ($id)
    {
        $approver = \Auth::user()->name;
        $leave = Leave::where('id', $id)->get()->first();
        $status = "Rejected by " . $approver;
        $leave->status = $status;

        $leave->save();

        Session::flash('success', 'Leave request was successfully rejected');
        return redirect()->route('leaves.approval', $id);
    }

    public function approve ($id)
    {
        $approver = \Auth::user()->name;

        $leave = Leave::where('id', $id)->get()->first();

        $status = "Approved by " . $approver;
        $leave->status = $status;
        $totalLeave = $leave->employee->number_leave;
        $leave->employee->number_leave = $totalLeave - 1;

        $leave->employee->save();
        $leave->save();

        Session::flash('success', 'Leave request was successfully approved');
        return redirect()->route('leaves.approval', $id);
    }

    public function cancel ($id)
    {
        $leave = Leave::where('id', $id)->get()->first();
        $leave->status = "Cancelled";

        $leave->save();

        Session::flash('success', 'Leave request was successfully cancelled');
        return redirect()->route('leaves.list.current');
    }
}

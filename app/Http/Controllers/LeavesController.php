<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Leave;
use App\Http\Controllers\Auth\AuthController;

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
    	$leaves = Leave::paginate(15);

    	return view('pages.leave.alllistofleave', ['leaves' => $leaves]);
    }
}

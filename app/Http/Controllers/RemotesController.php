<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Department;
use App\Models\Remote;
use App\Models\RecapRequest;
use Auth;
use Session;
use Validator;

class RemotesController extends Controller
{
    public function create (Request $request)
    {
    	$inputDate = $request->startdate;
        $date = date("Y-m-d", strtotime('-1 day', strtotime($inputDate)));

        $messages = [
            'startdate.after' => "The start date must be later than today",
            'enddate.after' => "The end date can not be earlier than the start date",
        ];

        $rules = [
            'startdate'     => 'required|date|after:yesterday',
            'enddate'       => 'required|date|after:' . $date,
            'description'   => 'required',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->route('remotes.create')
                        ->withErrors($validator)
                        ->withInput($request->all());
        }

    	$remote = new Remote;

    	$remote->date_start = $request->startdate;
        $remote->date_end = $request->enddate;
        $remote->description = $request->description;
        $remote->status = "Submitted";
        $remote->employees_id = $request->user()->id;

        $remote->save();

        Session::flash('success', 'Remote request was submitted successfully');
        return redirect()->route('remotes.list.current');
    }

    public function viewListof ()
    {
    	$remotes = Remote::orderBy('created_at','desc')->paginate(15);

    	return view('pages.remote.listOfRemote', ['remotes' => $remotes]);
    }

    public function viewDetails ($id)
    {
        $remotes = Remote::where('id', $id)->get();

        return view('pages.remote.remoteApproval', ['remotes' => $remotes]);
    }

    public function viewMyList ()
    {
        $user_id = \Auth::user()->id;
        $remotes = Remote::where('employees_id', $user_id)->orderBy('created_at','desc')->paginate(15);

        return view('pages.remote.myRemote', ['remotes' => $remotes]);
    }

    public function viewMyDetails ($id)
    {
        $remotes = Remote::where('id', $id)->get();

        return view('pages.remote.remoteDetails', ['remotes' => $remotes]);
    }

    public function viewEdit ($id) {
        $remotes = Remote::where('id', $id)->get();

        return view('pages.remote.editRemote', ['remotes' => $remotes]);
    }

    public function update (Request $request)
    {
        $inputDate = $request->startdate;
        $date = date("Y-m-d", strtotime('-1 day', strtotime($inputDate)));

        $messages = [
            'startdate.after' => "The start date must be later than today",
            'enddate.after' => "The end date can not be earlier than the start date",
        ];

        $rules = [
            'startdate'     => 'required|date|after:yesterday',
            'enddate'       => 'required|date|after:' . $date,
            'description'   => 'required',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput($request->all());
        }

        $remote = Remote::where('id', $request->id)->get()->first();

        $remote->date_start = $request->startdate;
        $remote->date_end = $request->enddate;
        $remote->description = $request->description;
        $remote->employees_id = $request->user()->id;

        $remote->save();

        Session::flash('success', 'Remote request was edited successfully');
        return redirect()->route('remotes.list.current');
    }

    public function reject ($id)
    {
        $approver = \Auth::user()->name;
        $remote = Remote::where('id', $id)->get()->first();
        $status = "Rejected by " . $approver;
        $remote->status = $status;

        $remote->save();

        Session::flash('success', 'Remote request was successfully rejected');
        return back();
    }

    public function approve ($id)
    {
        $approver = \Auth::user()->name;
        $remote = Remote::where('id', $id)->get()->first();
        $status = "Approved by " . $approver;
        $remote->status = $status;

        $remote->save();

        if(RecapRequest::isExistRow('period', date('M Y'))){
            if(RecapRequest::isExistRow('department', $remote->employee->department->name)){
                RecapRequest::where('department','=',$remote->employee->department->name)->increment('total_remotes');
            }
            else{
                $recap = new RecapRequest;

                $recap->department = $remote->employee->department->name;
                $recap->total_leaves = 0;
                $recap->total_remotes = 1;
                $recap->total_trainings = 0;
                $recap->total_procurements = 0;
                $recap->period = date('M Y');
                
                $recap->save();
            }
        }        
        else{
            $departments = Department::all();

            foreach ($departments as $department){
                if($department->name != 'Admin'){
                    $recap = new RecapRequest;

                    $recap->department = $department->name;

                    if($department->name == $remote->employee->department->name){
                        $recap->total_remotes = 1;
                    }
                    else{
                        $recap->total_remotes = 0;
                    }
                    $recap->total_leaves = 0;
                    $recap->total_trainings = 0;
                    $recap->total_procurements = 0;
                    $recap->period = date('M Y');
                    
                    $recap->save();
                }  
            }
        }

        Session::flash('success', 'Remote request was successfully approved');
        return back();
    }

    public function cancel ($id)
    {
        $remote = Remote::where('id', $id)->get()->first();
        $remote->status = "Cancelled";

        $remote->save();

        Session::flash('success', 'Remote request was successfully cancelled');
        return redirect()->route('remotes.list.current');
    }
}

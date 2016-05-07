<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Remote;
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
            'description'   => 'required|alpha_num',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect('/createRemote')
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
        return redirect('myRemote');
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
        $remote = Remote::where('id', $request->id)->get()->first();

        $remote->date_start = $request->startdate;
        $remote->date_end = $request->enddate;
        $remote->description = $request->reason;
        $remote->employees_id = $request->user()->id;

        $remote->save();

        Session::flash('success', 'Remote request was edited successfully');
        return back();
    }

    public function reject ($id)
    {
        $approver = \Auth::user()->name;
        $remote = Remote::where('id', $id)->get()->first();
        $status = "Rejected by " . $approver;
        $remote->status = $status;

        $remote->save();

        return back();
    }

    public function approve ($id)
    {
        $approver = \Auth::user()->name;
        $remote = Remote::where('id', $id)->get()->first();
        $status = "Approved by " . $approver;
        $remote->status = $status;

        $remote->save();

        return back();
    }

    public function cancel ($id)
    {
        $remote = Remote::where('id', $id)->get()->first();
        $remote->status = "Cancelled";

        $remote->save();

        return back();
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Remote;

class RemotesController extends Controller
{
    public function create (Request $request)
    {
    	$this->validate ($request, [
    		'startdate' => 'required|date|after:today',
    		'enddate' => 'required|date|after:startdate'
    	]);

    	$remote = new Remote;

    	$remote->date_start = $request->startdate;
        $remote->date_end = $request->enddate;
        $remote->description = $request->description;
        $remote->status = "Submitted";
        $remote->employees_id = $request->user()->id;

        $remote->save();

        return back();
    }

    public function viewListof ()
    {
    	$remotes = Remote::paginate(15);

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
        $remotes = Remote::where('employees_id', $user_id)->paginate(15);

        return view('pages.remote.myRemote', ['remotes' => $remotes]);
    }

    public function viewMyDetails ($id)
    {
        $remotes = Remote::where('id', $id)->get();

        return view('pages.remote.remoteDetails', ['remotes' => $remotes]);
    }
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Procurement;
use Session;

class ProcurementsController extends Controller
{
    public function create (Request $request)
    {
    	$procurement = new Procurement;

    	$procurement->title = $request->title;
        $procurement->estimate_price = $request->price_estimate;
        $procurement->description = $request->description;
        $procurement->status = "Submitted";
        $procurement->employees_id = $request->user()->id;

        $procurement->save();

        return back();
    }

    public function viewListof ()
    {
    	$procurements = Procurement::orderBy('created_at','desc')->paginate(15);

    	return view('pages.procurement.listOfProcurement', ['procurements' => $procurements]);
    }

    public function viewDetails ($id)
    {
        $procurements = Procurement::where('id', $id)->get();

        return view('pages.procurement.procurementApproval', ['procurements' => $procurements]);
    }

    public function viewMyList ()
    {
        $user_id = \Auth::user()->id;
        $procurements = Procurement::where('employees_id', $user_id)->orderBy('created_at','desc')->paginate(15);

        return view('pages.procurement.myProcurement', ['procurements' => $procurements]);
    }

    public function viewMyDetails ($id)
    {
        $procurements = Procurement::where('id', $id)->get();

        return view('pages.procurement.procurementDetails', ['procurements' => $procurements]);
    }

    public function viewEdit ($id) {
        $procurements = Procurement::where('id', $id)->get();

        return view('pages.procurement.editProcurement', ['procurements' => $procurements]);
    }

    public function update (Request $request)
    {
        $procurement = Procurement::where('id', $request->id)->get()->first();

        $procurement->title = $request->title;
        $procurement->estimate_price = $request->price_estimate;
        $procurement->description = $request->reason;
        $procurement->employees_id = $request->user()->id;

        $procurement->save();

        Session::flash('success', 'Procurement request was edited successfully');
        return back();
    }

    public function reject ($id)
    {
        $approver = \Auth::user()->name;
        $procurement = Procurement::where('id', $id)->get()->first();
        $status = "Rejected by " . $approver;
        $procurement->status = $status;

        $procurement->save();

        return back();
    }

    public function approve ($id)
    {
        $approver = \Auth::user()->name;
        $procurement = Procurement::where('id', $id)->get()->first();
        $status = "Approved by " . $approver;
        $procurement->status = $status;

        $procurement->save();

        return back();
    }

    public function cancel ($id)
    {
        $procurement = Procurement::where('id', $id)->get()->first();
        $procurement->status = "Cancelled";

        $procurement->save();

        return back();
    }
}

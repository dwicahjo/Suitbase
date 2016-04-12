<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Procurement;

class ProcurementsController extends Controller
{
    public function create (Request $request)
    {
    	$this->validate ($request, [
  			
    	]);

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
    	$procurements = Procurement::paginate(15);

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
        $procurements = Procurement::where('employees_id', $user_id)->paginate(15);

        return view('pages.procurement.myProcurement', ['procurements' => $procurements]);
    }

    public function viewMyDetails ($id)
    {
        $procurements = Procurement::where('id', $id)->get();

        return view('pages.procurement.procurementDetails', ['procurements' => $procurements]);
    }
}

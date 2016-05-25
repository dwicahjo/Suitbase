<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Procurement;
use App\Models\RecapRequest;
use Auth;
use Session;
use Validator;

class ProcurementsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function create (Request $request)
    {
        $rules = [
            'title'             => 'required',
            'description'       => 'required',
            'price_estimate'    => 'required|numeric'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->route('procurements.create')
                        ->withErrors($validator)
                        ->withInput($request->all());
        }

    	$procurement = new Procurement;

    	$procurement->title = $request->title;
        $procurement->estimate_price = $request->price_estimate;
        $procurement->description = $request->description;
        $procurement->status = "Submitted";
        $procurement->employees_id = $request->user()->id;

        $procurement->save();

        Session::flash('success', 'Procurement request was submitted successfully');
        return redirect()->route('procurements.list.current');
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
        $user_id = Auth::user()->id;
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
        $rules = [
            'title'             => 'required',
            'description'       => 'required',
            'price_estimate'    => 'required|numeric'
        ];

        $validator = Validator::make($request->all(), $rules);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput($request->all());
        }

        $procurement = Procurement::where('id', $request->id)->get()->first();

        $procurement->title = $request->title;
        $procurement->estimate_price = $request->price_estimate;
        $procurement->description = $request->description;
        $procurement->employees_id = $request->user()->id;

        $procurement->save();

        Session::flash('success', 'Procurement request was edited successfully');
        return redirect()->route('procurements.list.current');
    }

    public function reject ($id)
    {
        $approver = Auth::user()->name;
        $procurement = Procurement::where('id', $id)->get()->first();
        $status = "Rejected by " . $approver;
        $procurement->status = $status;

        $procurement->save();

        Session::flash('success', 'Procurement request was successfully rejected');
        return redirect()->route('procurements.approval', $id);
    }

    public function approve ($id)
    {
        $approver = Auth::user()->name;
        $procurement = Procurement::where('id', $id)->get()->first();
        $status = "Approved by " . $approver;
        $procurement->status = $status;

        $procurement->save();

        if(RecapRequest::isExistRow('period', date('M Y'))){
            if(RecapRequest::isExistRow('department', $procurement->employee->department->name)){
                RecapRequest::where('department','=',$procurement->employee->department->name)->increment('total_procurements');
            }
            else{
                $recap = new RecapRequest;

                $recap->department = $procurement->employee->department->name;
                $recap->total_leaves = 0;
                $recap->total_remotes = 0;
                $recap->total_trainings = 0;
                $recap->total_procurements = 1;
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

                    if($department->name == $procurement->employee->department->name){
                        $recap->total_procurements = 1;
                    }
                    else{
                        $recap->total_procurements = 0;
                    }
                    $recap->total_leaves = 0;
                    $recap->total_remotes = 0;
                    $recap->total_trainings = 0;
                    $recap->period = date('M Y');
                    
                    $recap->save();
                }
            }
        }

        Session::flash('success', 'Procurement request was successfully approved');
        return redirect()->route('procurements.approval', $id);
    }

    public function cancel ($id)
    {
        $procurement = Procurement::where('id', $id)->get()->first();
        $procurement->status = "Cancelled";

        $procurement->save();

        Session::flash('success', 'Procurement request was successfully cancelled');
        return redirect()->route('procurements.list.current');
    }
}

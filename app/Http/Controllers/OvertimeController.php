<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Overtime;
use Auth;
use DB;
use Session;

class OvertimeController extends Controller
{
    public function index()
    {
        $user = Auth::user()->id;
        return view('pages.overtime.createOvertime');
    }

    public function postOvertime(Request $request){
        $this->validate ($request, [
            'date' => 'required|date|before:tomorrow'
            ]);
        return $this->create($request->all());
    }

    protected function create(array $data)
    {
        // $startHour = substr($data['time_start'], 0, 2);
        // $startMin = substr($data['time_start'], 3, 2);
        // $endHour = substr($data['time_end'], 0, 2);
        // $endMin = substr($data['time_end'], 3, 2);

        // $diffHour = $endHour - $startHour;
        // $diffMin = $endMin - $startMin;

        Overtime::create([
            'description' => $data['description'],
            'time_end' => $data['endtime'],
            'time_start' => $data['starttime'],
            'date' => $data['date'],
            'status' => $data['status'],
            'employees_id' => $data['employees_id'],
            ]);

        Session::flash('success', 'Overtime log was submitted successfully');
        return $this->index();
    }

    public function showListOfOvertime(){
        $overtimes = DB::table('overtimes')
        ->join('users', 'employees_id', '=', 'users.id')
        ->join('divisions','users.divisions_id','=','divisions.id')
        ->select('overtimes.*','divisions.name as division', 'users.name as username')
        ->orderBy('overtimes.created_at','desc')
        ->get();
        return view('pages.overtime.listOfOvertime',['overtimes'=>$overtimes]);
    }

    public function showListOfMyOvertime(){
        $overtimes = Overtime::where('employees_id',Auth::user()->id)->orderBy('created_at','desc')->get();
        return view('pages.overtime.myOvertime',['overtimes'=>$overtimes]);
    }

    public function showDetails($id){
        $overtime = Overtime::where('id',$id)->get();
        return view('pages.overtime.overtimeDetails',['overtime'=>$overtime]);
    }

    public function showApproval($id){
        $overtimes = DB::table('overtimes')
        ->join('users', 'employees_id', '=', 'users.id')
        ->join('divisions','users.divisions_id','=','divisions.id')
        ->select('overtimes.*','divisions.name as division', 'users.name as username')
        ->where('overtimes.id',$id)
        ->get();
        return view('pages.overtime.overtimeapproval',['overtimes'=>$overtimes]);
    }

    public function viewEdit ($id) {
        $overtimes = Overtime::where('id', $id)->get();

        return view('pages.overtime.editovertime', ['overtimes' => $overtimes]);
    }

    public function update (Request $request)
    {
        $this->validate ($request, [
            'date' => 'required|date|before:tomorrow                '
            ]);

        $overtime = Overtime::where('id', $request->id)->get()->first();

        $overtime->description = $request->description;
        $overtime->time_start = $request->starttime;
        $overtime->time_end = $request->endtime;
        $overtime->date = $request->date;
        $overtime->description = $request->reason;

        $overtime->save();

        Session::flash('success', 'Overtime log was edited successfully');
        return back();
    }

    public function reject ($id)
    {
        $approver = \Auth::user()->name;
        $overtime = Overtime::where('id', $id)->get()->first();
        $status = "Rejected by " . $approver;
        $overtime->status = $status;

        $overtime->save();

        return back();
    }

    public function approve ($id)
    {
        $approver = \Auth::user()->name;
        $overtime = Overtime::where('id', $id)->get()->first();
        $status = "Approved by " . $approver;
        $overtime->status = $status;

        $overtime->save();

        return back();
    }
}

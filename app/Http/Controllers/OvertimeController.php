<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Overtime;
use Auth;
use DB;
use Session;
use Validator;

class OvertimeController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $user = Auth::user()->id;
        return view('pages.overtime.createOvertime');
    }

    public function postOvertime(Request $request)
    {
        $messages = [
            'date.before' => "The date can not be later than today",
        ];

        $rules = [
            'date'          => 'required|date|before:tomorrow',
            'description'   => 'required',
            'starttime'     => 'required',
            'endtime'       => 'required',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->route('overtime.create')
                        ->withErrors($validator)
                        ->withInput($request->all());
        }

        return $this->create($request->all());
    }

    protected function create(array $data)
    {
        $startHour = substr($data['starttime'], 0, 2);
        $startMin = substr($data['starttime'], 3, 2);
        $endHour = substr($data['endtime'], 0, 2);
        $endMin = substr($data['endtime'], 3, 2);

        $diffHour = $endHour - $startHour;
        $diffMin = $endMin - $startMin;

        $totalHours = $diffHour . " hours " . $diffMin . " minutes";

        Overtime::create([
            'description' => $data['description'],
            'time_end' => $data['endtime'],
            'time_start' => $data['starttime'],
            'date' => $data['date'],
            'status' => $data['status'],
            'employees_id' => $data['employees_id'],
            'total_hours' => $totalHours
            ]);

        Session::flash('success', 'Overtime log was submitted successfully');
        return redirect()->route('overtime.list.current');
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

        Session::flash('success', 'Overtime log was updated successfully');
        return redirect()->route('overtime.edit', $request->id);
    }

    public function reject ($id)
    {
        $approver = \Auth::user()->name;
        $overtime = Overtime::where('id', $id)->get()->first();
        $status = "Rejected by " . $approver;
        $overtime->status = $status;

        $overtime->save();

        Session::flash('success', 'Overtime log was successfully rejected');
        return redirect()->route('overtime.approval', $id);
    }

    public function approve ($id)
    {
        $approver = \Auth::user()->name;
        $overtime = Overtime::where('id', $id)->get()->first();
        $status = "Approved by " . $approver;
        $overtime->status = $status;

        $overtime->save();

        Session::flash('success', 'Overtime log was successfully approved');
        return redirect()->route('overtime.approval', $id);
    }

    public function cancel ($id)
    {
        $overtime = Overtime::where('id', $id)->get()->first();
        $overtime->status = "Cancelled";

        $overtime->save();

        Session::flash('success', 'Overtime log was successfully cancelled');
        return redirect()->route('overtime.list.current');
    }
}

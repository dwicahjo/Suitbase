<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Overtime;
use Auth;
use DB;
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
        Overtime::create([
            'description' => $data['description'],
            'time_end' => $data['endtime'],
            'time_start' => $data['starttime'],
            'date' => $data['date'],
            'status' => $data['status'],
            'employees_id' => $data['employees_id'],
            ]);
        return $this->index();
    }

    public function showListOfOvertime(){
        //$trainings = Training::orderBy('created_at','desc')->get();
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
        //$trainings = Training::orderBy('created_at','desc')->get();
        $overtimes = DB::table('overtimes')
        ->join('users', 'employees_id', '=', 'users.id')
        ->join('divisions','users.divisions_id','=','divisions.id')
        ->select('overtimes.*','divisions.name as division', 'users.name as username')
        ->where('overtimes.id',$id)
        ->get();
        return view('pages.overtime.overtimeapproval',['overtimes'=>$overtimes]);
    }
}

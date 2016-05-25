<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Models\Training;
use App\Models\RecapRequest;
use DB;
use Session;
use Validator;

class TrainingController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        $user = Auth::user()->id;
        return view('pages.training.createTraining');
    }

    public function postTraining(Request $request)
    {
        $messages = [
            'date.after' => "The date must be later than today",
        ];

        $rules = [
            'title'             => 'required',
            'date'              => 'required|date|after:today',
            'description'       => 'required',
            'price_estimate'    => 'required|numeric'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->route('trainings.create')
                        ->withErrors($validator)
                        ->withInput($request->all());
        }
        return $this->create($request->all());
    }

   protected function create(array $data)
    {
        Training::create([
            'description' => $data['description'],
            'title' => $data['title'],
            'employees_id' => $data['employees_id'],
            'date' => $data['date'],
            'estimate_price' => $data['price_estimate'],
            'status' => $data['status'],
        ]);

        Session::flash('success', 'Training request was submitted successfully');
        return redirect()->route('trainings.list.current');
    }

    // protected function listTraining($trainings)
    // {
    //     return view('pages.training.listOfTraining', compact('trainings'));
    // }

    public function showListOfTraining(){
        //$trainings = Training::orderBy('created_at','desc')->get();
        $trainings = DB::table('trainings')
            ->join('users', 'employees_id', '=', 'users.id')
            ->join('divisions','users.divisions_id','=','divisions.id')
            ->select('trainings.*','divisions.name as division', 'users.name as username')
            ->orderBy('trainings.created_at','desc')
            ->get();
        // return $this->listTraining($trainings);
        return view('pages.training.listOfTraining', ['trainings' => $trainings]);
    }

    public function showListOfMyTraining(){
        $trainings = Training::where('employees_id',Auth::user()->id)->orderBy('created_at','desc')->get();
        // view()->share('isViewMine', true);
        return view('pages.training.myTraining', ['trainings' => $trainings]);
    }

    public function showDetail($id){

        $training = Training::where('id',$id)->get();
        return view('pages.training.trainingDetails',['training'=>$training]);
    }

    public function showApproval($id){
        //$trainings = Training::orderBy('created_at','desc')->get();
        $training = DB::table('trainings')
                ->join('users', 'employees_id', '=', 'users.id')
                ->join('divisions','users.divisions_id','=','divisions.id')
                ->select('trainings.*','divisions.name as division', 'users.name as username')
                ->where('trainings.id',$id)
                ->get();
        return view('pages.training.trainingApproval',['training'=>$training]);
    }

    public function viewEdit ($id) {
        $trainings = Training::where('id', $id)->get();

        return view('pages.training.editTraining', ['trainings' => $trainings]);
    }

    public function update (Request $request)
    {
        $messages = [
            'date.after' => "The date must be later than today",
        ];

        $rules = [
            'title'             => 'required',
            'date'              => 'required|date|after:today',
            'description'       => 'required',
            'price_estimate'    => 'required|numeric'
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->back()
                        ->withErrors($validator)
                        ->withInput($request->all());
        }

        $training = Training::where('id', $request->id)->get()->first();

        $training->title = $request->title;
        $training->date = $request->date;
        $training->estimate_price = $request->price_estimate;
        $training->description = $request->description;
        $training->employees_id = $request->user()->id;

        $training->save();

        Session::flash('success', 'Training request was edited successfully');
        return redirect()->route('trainings.list.current');
    }

    public function reject ($id)
    {
        $approver = Auth::user()->name;
        $training = Training::where('id', $id)->get()->first();
        $status = "Rejected by " . $approver;
        $training->status = $status;

        $training->save();

        Session::flash('success', 'Training request was successfully rejected');
        return redirect()->route('trainings.approval', $id);
    }

    public function approve ($id)
    {
        $approver = Auth::user()->name;
        $training = Training::where('id', $id)->get()->first();
        $status = "Approved by " . $approver;
        $training->status = $status;

        $training->save();

        if(RecapRequest::isExistRow('period', date('M Y'))){
            if(RecapRequest::isExistRow('department', $training->employee->department->name)){
                RecapRequest::where('department','=',$training->employee->department->name)->increment('total_trainings');
            }
            else{
                $recap = new RecapRequest;

                $recap->department = $training->employee->department->name;
                $recap->total_leaves = 0;
                $recap->total_remotes = 0;
                $recap->total_trainings = 1;
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

                    if($department->name == $training->employee->department->name){
                        $recap->total_trainings = 1;
                    }
                    else{
                        $recap->total_trainings = 0;
                    }
                    $recap->total_leaves = 0;
                    $recap->total_remotes = 0;
                    $recap->total_procurements = 0;
                    $recap->period = date('M Y');
                    
                    $recap->save();
                }
            }
        }

        Session::flash('success', 'Training request was successfully approved');
        return redirect()->route('trainings.approval', $id);
    }

    public function cancel ($id)
    {
        $training = Training::where('id', $id)->get()->first();
        $training->status = "Cancelled";

        $training->save();

        Session::flash('success', 'Training request was successfully approved');
        return redirect()->route('trainings.list.current');
    }
}

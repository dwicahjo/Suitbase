<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Models\Training;
use DB;
use Session;
use Validator;

class TrainingController extends Controller
{
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
            'date' => 'date|after:today',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect('/createTraining')
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
        return $this->index();
    }

    public function showListOfTraining(){
        //$trainings = Training::orderBy('created_at','desc')->get();
        $trainings = DB::table('trainings')
            ->join('users', 'employees_id', '=', 'users.id')
            ->join('divisions','users.divisions_id','=','divisions.id')
            ->select('trainings.*','divisions.name as division', 'users.name as username')
            ->orderBy('trainings.created_at','desc')
            ->get();
        return view('pages.training.listOfTraining',['trainings'=>$trainings]);
    }

    public function showListOfMyTraining(){
        $trainings = Training::where('employees_id',Auth::user()->id)->orderBy('created_at','desc')->get();
        return view('pages.training.myTraining',['trainings'=>$trainings]);
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
        $training = Training::where('id', $request->id)->get()->first();

        $training->title = $request->title;
        $training->date = $request->date;
        $training->estimate_price = $request->price_estimate;
        $training->description = $request->reason;
        $training->employees_id = $request->user()->id;

        $training->save();

        Session::flash('success', 'Training request was edited successfully');
        return back();
    }

    public function reject ($id)
    {
        $approver = \Auth::user()->name;
        $training = Training::where('id', $id)->get()->first();
        $status = "Rejected by " . $approver;
        $training->status = $status;

        $training->save();

        return back();
    }

    public function approve ($id)
    {
        $approver = \Auth::user()->name;
        $training = Training::where('id', $id)->get()->first();
        $status = "Approved by " . $approver;
        $training->status = $status;

        $training->save();

        return back();
    }

    public function cancel ($id)
    {
        $training = Training::where('id', $id)->get()->first();
        $training->status = "Cancelled";

        $training->save();

        return back();
    }
}

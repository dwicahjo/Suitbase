<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Models\Training;
use DB;

class TrainingController extends Controller
{
    public function index()
    {
        $user = Auth::user()->id;
        return view('pages.training.createTraining');
    }

    public function postTraining(Request $request){
/*        $this->validate ($request, [
            'title' => 'required',
            'date' => 'required',
            'price_estimate' => 'required',
            'description' => 'required,'
        ]);*/
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
}

<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Models\Feedback;
use DB;

class FeedbackController extends Controller
{
    public function index()
    {   
        if(Auth::user()){
            $user = Auth::user()->id;
            $feedbacks = Feedback::where('employees_id', $user)->orderBy('created_at','desc')->take(10)->get();
            return view('pages.feedback.createFeedback',['feedbacks'=>$feedbacks]);
        }
            return view('auth.login');
    }

    public function postFeedback(Request $request){
        $this->validate ($request, [
            'description' => 'required',
        ]);
        return $this->create($request->all());
    }

   protected function create(array $data)
    {
        Feedback::create([
            'description' => $data['description'],
            'is_anonim' => $data['is_anonim'],
            'employees_id' => $data['employees_id'],
        ]);
        return $this->index();
    }

    public function showListOfFeedback(){
        $feedbacks = DB::table('feedbacks')
            ->join('users', 'employees_id', '=', 'users.id')
            ->join('divisions','users.divisions_id','=','divisions.id')
            ->select('feedbacks.*','divisions.name as division', 'users.name as username')
            ->orderBy('feedbacks.created_at','desc')
            ->get();
        return view('pages.feedback.listOfFeedback',['feedbacks'=>$feedbacks]);
    }

    public function showDetail($id){

        $feedback = Feedback::where('id',$id)->get();
        return view('pages.feedback.detailFeedback',['feedback'=>$feedback]);
    }

}

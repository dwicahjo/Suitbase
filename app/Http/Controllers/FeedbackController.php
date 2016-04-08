<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Auth;
use App\Http\Requests;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    public function index()
    {
        $user = Auth::user()->id;
        $feedbacks = Feedback::where('employees_id', $user)->orderBy('created_at','desc')->take(5)->get();
        return view('pages.feedback.createFeedback',['feedbacks'=>$feedbacks]);
    }

    public function postFeedback(Request $request){
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
        $feedbacks = Feedback::orderBy('created_at','desc')->get();
        return view('pages.feedback.listOfFeedback',['feedbacks'=>$feedbacks]);
    }

}

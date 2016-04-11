<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
<<<<<<< HEAD

=======
use Auth;
>>>>>>> 2c597105d518500ff6ce263e6dcf3c8fe7732c1a
use App\Http\Requests;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    public function index()
    {
<<<<<<< HEAD
        return view('pages.feedback.createFeedback');
=======
        $user = Auth::user()->id;
        $feedbacks = Feedback::where('employees_id', $user)->orderBy('created_at','desc')->take(5)->get();
        return view('pages.feedback.createFeedback',['feedbacks'=>$feedbacks]);
>>>>>>> 2c597105d518500ff6ce263e6dcf3c8fe7732c1a
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
<<<<<<< HEAD
        return view('pages.feedback.createFeedback');
    }
=======
        return $this->index();
    }

    public function showListOfFeedback(){
        $feedbacks = Feedback::orderBy('created_at','desc')->get();
        return view('pages.feedback.listOfFeedback',['feedbacks'=>$feedbacks]);
    }

    public function showDetail($id){

        $feedback = Feedback::where('id',$id)->get();

        return view('pages.feedback.detailFeedback',['feedback'=>$feedback]);
    }

>>>>>>> 2c597105d518500ff6ce263e6dcf3c8fe7732c1a
}

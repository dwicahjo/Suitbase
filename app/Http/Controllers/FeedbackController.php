<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\Feedback;

class FeedbackController extends Controller
{
    public function index()
    {
        return view('pages.feedback.createFeedback');
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
        return view('pages.feedback.createFeedback');
    }
}

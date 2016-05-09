<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\SurveysForm;
use App\Models\Survey;
use App\Models\QuestionsSurvey;
use App\Models\User;
use Validator;
use Session;
use Auth;

class SurveysController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    public function index()
    {
        return view('pages.survey.createSurvey');
    }
    public function showListofSurveys(){
        if(Auth::user()->type == "HR"){
            $surveys = Survey::all();
        }else{
            $surveys = Survey::where('employees_id',Auth::user()->id)->get();
        }
        return view('pages.survey.listOfSurvey',['surveys'=>$surveys]);
    }
    protected function create(array $data)
    {
        $divisionId =1;
        $surveyform = SurveysForm::create([
            'title' => $data['title'],
            'date_start' => $data['date_start'],
            'divisions_id' => $divisionId,
            'date_end' => $data['date_end'],
            ]);
        $questions = $data['question'];
        $idSurveysForm = $surveyform->id;
        $i =0;
        $questionType = $data['question_type'];
        foreach ($questions as $question){
        if($questionType[$i] == "text"){
            $type = 1;
        }else if($questionType[$i] == "multiple-choice"){
            $type = 2;
        }else{
            $type = 3;
        }
          QuestionsSurvey::create([
            'question' => $question,
            'question_type' => $type,
            'surveys_form_id' => $idSurveysForm,
            ]);
          $i++;
      }
      $users = User::all();
      foreach ($users as $user){
        Survey::create([
            'status' => 'Submitted',
            'employees_id' => $user->id,
            'divisions_id' => $user->divisions_id,
            'surveys_form_id' => $idSurveysForm,
            ]);
    }
    Session::flash('success', 'Survey Form request was created successfully');
    return redirect()->route('survey.create');
}
public function postSurvey(Request $request){
    $inputDate = $request->date_start;
    $date = date("Y-m-d", strtotime('-1 day', strtotime($inputDate)));

    $messages = [
    'date_start.after' => "The start date must be later than today",
    'date_end.after' => "The end date can not be earlier than the start date",
    ];

    $rules = [
    'date_start' => 'date|after:today',
    'date_end' => 'date|after:' . $date,
    'question' => 'required',
    ];

    $validator = Validator::make($request->all(), $rules, $messages);

    if ($validator->fails()) {
        return redirect()->route('appraisal.create')
        ->withErrors($validator)
        ->withInput($request->all());
    }

    return $this->create($request->all());
}

public function showDetail($id)
{
    $survey = Survey::where('id', $id)->get()->first();
    $surveyForm = $survey->surveyForm->id;
    $questions = QuestionsSurvey::where('surveys_form_id',$surveyForm)->get();
    return view('pages.survey.surveyDetails', ['survey' => $survey],['questions' => $questions]);
}
}

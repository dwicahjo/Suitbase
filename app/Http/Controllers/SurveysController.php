<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use App\Models\SurveysForm;
use App\Models\Survey;
use App\Models\QuestionsSurvey;
use App\Models\OptionsSurvey;
use App\Models\AnswersSurvey;
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

    public function showListofMySurveys(){
        $surveys = Survey::where('employees_id',Auth::user()->id)->orderBy('created_at','desc')->get();
        return view('pages.survey.mySurvey',['surveys'=>$surveys]);
    }

    public function showListofSurveys(){
        if(Auth::user()->type == "HR"){
            $surveys = Survey::orderBy('created_at','desc')->get();
        }else{
            $surveys = Survey::where('employees_id',Auth::user()->id)->orderBy('created_at','desc')->get();
        }
        return view('pages.survey.listOfSurvey',['surveys'=>$surveys]);
    }

    public function showListofSurveysForm(){
        $surveysForm = SurveysForm::orderBy('created_at','desc')->get();
        return view('pages.survey.listOfSurveyForm',['surveyForm'=>$surveysForm]);
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
            return redirect()->route('survey.create')
            ->withErrors($validator)
            ->withInput($request->all());
        }

        return $this->create($request->all());
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
        $idOption = $data['idOption'];
        foreach ($questions as $question){
            if($questionType[$i] == "text"){
                $type = 1;
            }else if($questionType[$i] == "multiple-choice"){
                $type = 2;
            }else{
                $type = 3;
            }
            $questionInsert =   QuestionsSurvey::create([
                'question' => $question,
                'question_type' => $type,
                'surveys_form_id' => $idSurveysForm,
                ]);
            if($type == 2 || $type == 3){
                if($type == 2){
                    $name = "radio".$idOption[$i];
                    $option = $data[$name];
                }else{
                    $name = "checkbox".$idOption[$i];
                    $option = $data[$name];
                }
                foreach ($option as $o) {
                    OptionsSurvey::create([
                        'question_id' => $questionInsert->id,
                        'option' => $o,
                        ]);
                }
            }
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
        return redirect()->route('survey.form');
    }

    public function showDetail($id)
    {
        $survey = Survey::where('id', $id)->get()->first();
        $surveyForm = $survey->surveyForm->id;
        $questions = QuestionsSurvey::where('surveys_form_id',$surveyForm)->get();
        $answers = AnswersSurvey::where('surveys_id',$survey->id);
        return view('pages.survey.surveyDetails')->with(compact('survey','questions','answers'));
    }

    public function showDetailForm($id)
    {
        $surveyForm = SurveysForm::where('id', $id)->get()->first();
        $questions = QuestionsSurvey::where('surveys_form_id',$surveyForm->id)->get();
        return view('pages.survey.surveyFormDetails', ['survey' => $surveyForm],['questions' => $questions]);
    }

    public function showRecap()
    {
        return view('pages.survey.recapSurvey');
    }

    public function fillSurvey($id){
        $survey = Survey::where('id',$id)->get()->first();
        $questions = QuestionsSurvey::where('surveys_form_id',$survey->surveys_form_id)->get();
        $answers = AnswersSurvey::where('surveys_id',$id)->get();
        return view('pages.survey.fillSurvey')->with(compact('survey','questions','answers'));
    }

    public function postFillSurvey(Request $request)
    {
        print_r($request->idQuestion);
        foreach ($request->idQuestion as $idQuestion){
            $question = QuestionsSurvey::where('id',$idQuestion)->get()->first();
            if($question->question_type == "1"){
                $name = "text".$idQuestion;
                AnswersSurvey::create([
                    'surveys_id' => $request->idSurvey,
                    'question_id' => $idQuestion,
                    'answer' =>$request->$name,
                    ]);
            }elseif($question->question_type == "2"){
                $name = "radio".$idQuestion;
                AnswersSurvey::create([
                    'surveys_id' => $request->idSurvey,
                    'question_id' => $idQuestion,
                    'answer' =>$request->$name,
                    ]);
            }else{
                $name = "checkbox".$idQuestion;
                foreach($request->$name as $checkbox){
                    AnswersSurvey::create([
                        'surveys_id' => $request->idSurvey,
                        'question_id' => $idQuestion,
                        'answer' =>$checkbox,
                        ]);
                }
            }
        }
        Session::flash('success', 'Survey was filled successfully');
        return redirect()->route('survey.mylist');
    }

    public function editSurveyForm($id)
    {
        $surveyForm = SurveysForm::where('id', $id)->get()->first();
        $questions = QuestionsSurvey::where('surveys_form_id',$id)->get();
        return view('pages.survey.editSurvey', ['surveyForm' => $surveyForm],['questions' => $questions]);
    }

    public function updateSurveyForm(Request $request)
    {
        $surveyForm = SurveysForm::where('id', $request->id)->get()->first();
        $surveyForm->title = $request->title;
        $surveyForm->date_start = $request->date_start;
        $surveyForm->date_end = $request->date_end;
        $surveyForm->save();

        if($request->oldQuestionId){
            foreach($request->oldQuestionId as $idQuestion){
                $questionD = QuestionsSurvey::where('id',$idQuestion)->get()->first();
                if($questionD->question_type > 1){
                    $optionsD = $questionD->option()->get();
                    foreach($optionsD as $optionD){
                        $deleted = OptionsSurvey::where('id',$optionD->id)->get()->first();
                        $deleted->delete();
                    }
                }
                $questionD->delete();
            }
        }

        if($request->oldQuestion){
            $i =0;
            $idSurveysForm = $surveyForm->id;
            $oldQuestionType = $request->oldQuestionType;
            $oldIdOption = $request->oldIdOption;
            foreach($request->oldQuestion as $question){
                if($oldQuestionType[$i] == "text"){
                    $type = 1;
                }else if($oldQuestionType[$i] == "multiple-choice"){
                    $type = 2;
                }else{
                    $type = 3;
                }
                $questionInsert =   QuestionsSurvey::create([
                    'question' => $question,
                    'question_type' => $type,
                    'surveys_form_id' => $idSurveysForm,
                    ]);
                if($type == 2 || $type == 3){
                    if($type == 2){
                        $name = "oldRadio".$oldIdOption[$i];
                        $option = $request->$name;
                    }else{
                        $name = "oldCheckbox".$oldIdOption[$i];
                        $option = $request->$name;
                    }
                    foreach ($option as $o) {
                        OptionsSurvey::create([
                            'question_id' => $questionInsert->id,
                            'option' => $o,
                            ]);
                    }
                }
                $i++;
            }
        }

        if($request->question){
            $idSurveysForm = $surveyForm->id;
            $i =0;
            $questionType = $request->question_type;
            $idOption = $request->idOption;
            foreach ($request->question as $question){
                if($questionType[$i] == "text"){
                    $type = 1;
                }else if($questionType[$i] == "multiple-choice"){
                    $type = 2;
                }else{
                    $type = 3;
                }
                $questionInsert =   QuestionsSurvey::create([
                    'question' => $question,
                    'question_type' => $type,
                    'surveys_form_id' => $idSurveysForm,
                    ]);
                if($type == 2 || $type == 3){
                    if($type == 2){
                        $name = "radio".$idOption[$i];
                        $option = $request->$name;
                    }else{
                        $name = "checkbox".$idOption[$i];
                        $option = $request->$name;
                    }
                    foreach ($option as $o) {
                        OptionsSurvey::create([
                            'question_id' => $questionInsert->id,
                            'option' => $o,
                            ]);
                    }
                }
                $i++;
            }

      }
      Session::flash('success', 'Appraisal Template was edited successfully');
      return back();
  }
}

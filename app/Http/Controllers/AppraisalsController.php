<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\Models\Division;
use App\Models\AppraisalsTemplate;
use App\Models\Appraisal;
use App\Models\Answer;
use App\Models\Question;
use App\Models\Supervisor;
use App\Models\User;
use Session;
use Validator;

class AppraisalsController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $divisions = Division::all();
        return view('pages.appraisal.createAppraisal',['divisions'=>$divisions]);
    }

    public function postAppraisal(Request $request){
        $inputDate = $request->date_start;
        $date = date("Y-m-d", strtotime('-1 day', strtotime($inputDate)));

        $messages = [
        'date_start.after' => "The start date must be later than today",
        'date_end.after' => "The end date can not be earlier than the start date",
        ];

        $rules = [
        'date_start' => 'date|after:today',
        'date_end' => 'date|after:' . $date,
        'division_id' => 'exists:divisions,id',
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

    protected function create(array $data)
    {
        $users=User::where('divisions_id',$data['division_id'])->get();
        if($users->count() > 0){
            $appraisalTemplate = AppraisalsTemplate::create([
                'title' => $data['title'],
                'divisions_id' => $data['division_id'],
                'date_start' => $data['date_start'],
                'date_end' => $data['date_end'],
                ]);
            $questions = $data['question'];
            $idAppraisalsTemplate = $appraisalTemplate->id;
            foreach ($questions as $question){
              Question::create([
                'question' => $question,
                'appraisals_template_id' => $idAppraisalsTemplate,
                ]);
          }
          foreach ($users as $user){
            $supervisor = $user->supervisor;
                Appraisal::create([
                    'status' => 'Submitted',
                    'employees_id' => $user->id,
                    'divisions_id' => $user->divisions_id,
                    'appraisals_template_id' => $idAppraisalsTemplate,
                    'supervisors_id' => $supervisor->supervisors_id,
                    ]);

        }
        Session::flash('success', 'Appraisal Template request was created successfully');
    }else{
        $name = Division::where('id',$data['division_id'])->first()->name;
        $message = 'Appraisal Template request was not created because Division '.$name.' is not have employee';
        Session::flash('fail', $message);
    }
    return redirect()->route('appraisal.template');
}

public function showListOfAppraisalsTemplate()
{
    $appraisalsTemplate = AppraisalsTemplate::orderBy('created_at','desc')->get();
    return view('pages.appraisal.viewListAppraisalTemplate',['appraisalsTemplate'=>$appraisalsTemplate]);
}

public function showListOfAppraisals()
{
    if(Auth::user()->type == "HR"){
        $appraisals = Appraisal::orderBy('created_at','desc')->get();
    }else if(Auth::user()->type == "Supervisor"){
        $appraisals = Appraisal::where('supervisors_id',Auth::user()->id)->orderBy('created_at','desc')->get();
    }

    return view('pages.appraisal.listofAppraisal',['appraisals'=>$appraisals]);
}

public function editAppraisalTemplate($id)
{
    $appraisalTemplate = AppraisalsTemplate::where('id', $id)->get();
    $questions = Question::where('appraisals_template_id',$id)->get();
    $divisions = Division::all();
    return view('pages.appraisal.editAppraisal', ['appraisalTemplate' => $appraisalTemplate],['questions' => $questions]);
}

public function updateAppraisalTemplate(Request $request)
{
    $inputDate = $request->date_start;
        $date = date("Y-m-d", strtotime('-1 day', strtotime($inputDate)));

        $messages = [
        'date_start.after' => "The start date must be later than today",
        'date_end.after' => "The end date can not be earlier than the start date",
        ];

        $rules = [
        'date_start' => 'date|after:today',
        'date_end' => 'date|after:' . $date,
        'division_id' => 'exists:divisions,id',
        ];

        $validator = Validator::make($request->all(), $rules, $messages);

        if ($validator->fails()) {
            return redirect()->route('appraisal.edit', ['id' => $request->id])
            ->withErrors($validator)
            ->withInput($request->all());
        }

    $appraisalTemplate = AppraisalsTemplate::where('id', $request->id)->get()->first();
    $appraisalTemplate->title = $request->title;
    $appraisalTemplate->date_start = $request->date_start;
    $appraisalTemplate->date_end = $request->date_end;
    $appraisalTemplate->save();

    if($request->oldQuestionId){
        foreach($request->oldQuestionId as $idQuestion){
            $question = Question::where('id',$idQuestion)->get()->first();
            $question->delete();
        }
    }
    if($request->oldQuestion){
        foreach($request->oldQuestion as $question){
            Question::create([
            'question' => $question,
            'appraisals_template_id' => $request->id,
            ]);
        }
    }

    if($request->question){
        foreach ($request->question as $question){
          Question::create([
            'question' => $question,
            'appraisals_template_id' => $request->id,
            ]);
      }
  }
  Session::flash('success', 'Appraisal Template was edited successfully');
  return back();
}

public function fillAppraisal($id){
    $appraisal = Appraisal::where('id',$id)->get()->first();
    $questions = Question::where('appraisals_template_id',$appraisal->appraisals_template_id)->get();
    $answers = Answer::where('appraisals_id',$id)->get();
    
    return view('pages.appraisal.fillAppraisal')->with(compact('appraisal','questions','answers'));
}

public function postFillAppraisal(Request $request)
{
    $counter = 0;
    $total = 0;

    if(Answer::where('appraisals_id',$request->appraisal_id)->get()->count() > 0){
        $answers = Answer::where('appraisals_id',$request->appraisal_id)->get();
        foreach($answers as $answer){
            $answer->delete();
        }
    }
    foreach ($request->answer as $key => $value){
        Answer::create([
            'question_id' => $key,
            'appraisals_id' => $request->appraisal_id,
            'answer' =>$request->answer[$key],
            ]);
        $total += $request->answer[$key];
        $counter++;
    }

    $appraisal = Appraisal::find($request->appraisal_id);
    $appraisal->comment = $request->comment;
    $appraisal->average_score = $total/$counter;
    $appraisal->save();

    Session::flash('success', 'Appraisal was filled successfully');
    return back();
}

public function showMyAppraisals(){
    $appraisals = Appraisal::where('employees_id', Auth::user()->id)->get();
    return view('pages.appraisal.myAppraisal', compact('appraisals'));
}

public function showRecap($idDivision)
{

    return view('pages.appraisal.recapAppraisal');
}

public function showDetail($id){
    $appraisal = Appraisal::where('id',$id)->get()->first();
    $questions = Question::where('appraisals_template_id',$appraisal->appraisals_template_id)->get();
    $answers = Answer::where('appraisals_id',$id)->get();
    return view('pages.appraisal.detailAppraisal')->with(compact('appraisal','questions','answers'));
}

public function showDetailTemplate($id){
    $appraisalTemplate = AppraisalsTemplate::where('id', $id)->get()->first();
    $questions = Question::where('appraisals_template_id',$id)->get();
    $divisions = Division::all();
    return view('pages.appraisal.detailAppraisalTemplate')->with(compact('appraisalTemplate','questions','divisions'));
}

}

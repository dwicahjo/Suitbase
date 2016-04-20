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
use DB;

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
        /*$this->validate ($request, [
            'date' => 'required|date|after:today'
            ]);*/
return $this->create($request->all());
}

protected function create(array $data)
{
    AppraisalsTemplate::create([
        'title' => $data['title'],
        'divisions_id' => $data['division_id'],
        'date_start' => $data['date_start'],
        'date_end' => $data['date_end'],
        ]);
    $questions = $data['question'];
    $idAppraisalsTemplate = AppraisalsTemplate::where('title',$data['title'])->get();
    foreach ($questions as $question){
      Question::create([
        'question' => $question,
        'appraisals_template_id' => $idAppraisalsTemplate[0]->id,
        ]);
  }
  $users=User::where('divisions_id',$data['division_id'])->get();
  /*print_r($users);*/
  foreach ($users as $user){
    $supervisors_id = DB::table('supervisors')
        ->select('supervisors_id')
        ->where('supervisees_id',$user->id)
        ->get();
    if($supervisors_id){
    Appraisal::create([
        'status' => 'Submitted',
        'employees_id' => $user->id,
        'divisions_id' => $user->divisions_id,
        'appraisals_template_id' => $idAppraisalsTemplate[0]->id,
        'supervisors_id' => $supervisors_id[0]->supervisors_id,
        ]);
    }
}
Session::flash('success', 'Appraisal Template request was created successfully');
return $this->index();
}

public function showListOfAppraisalsTemplate()
{
    $appraisalsTemplate = AppraisalsTemplate::orderBy('created_at','desc')->get();
    return view('pages.appraisal.viewListAppraisalTemplate',['appraisalsTemplate'=>$appraisalsTemplate]);
}

public function showListOfAppraisals()
{
    $appraisals = Appraisal::orderBy('created_at','desc')->get();
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
    $appraisalTemplate = AppraisalsTemplate::where('id', $request->id)->get()->first();
    $appraisalTemplate->date_start = $request->date_start;
    $appraisalTemplate->date_end = $request->date_end;
    $appraisalTemplate->save();

    $i=0;
    foreach($request->oldQuestionId as $idQuestion){
        $question = Question::where('id',$idQuestion)->get()->first();
        $question->question = $request->oldQuestion[$i];
        $question->save();
        $i++;
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
    return view('pages.appraisal.fillAppraisal',['appraisal'=>$appraisal],['questions'=>$questions]);
}

public function postFillAppraisal(Request $request)
{
    /*$appraisalTemplate = AppraisalsTemplate::where('id', $request->id)->get()->first();
    $appraisalTemplate->date_start = $request->date_start;
    $appraisalTemplate->date_end = $request->date_end;
    $appraisalTemplate->save();
    $i=0;
    foreach($request->oldQuestionId as $idQuestion){
        $question = Question::where('id',$idQuestion)->get()->first();
        $question->question = $request->oldQuestion[$i];
        $question->save();
        $i++;
    }*/

    foreach ($request->answer as $key => $value){
     Answer::create([
        'question_id' => $key,
        'appraisals_id' => $request->appraisal_id,
        'answer' =>$request->answer[$key],
        ]);
  }
  Session::flash('success', 'Appraisal was filled successfully');
  return back();
}

}


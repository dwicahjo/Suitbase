<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use App\Http\Requests;
use Auth;
use App\Models\Division;
use App\Models\AppraisalsTemplate;
use App\Models\Question;
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
  Session::flash('success', 'Appraisal Template request was created successfully');
  return $this->index();
}

public function showListOfAppraisalsTemplate()
{
    $appraisalsTemplate = AppraisalsTemplate::orderBy('created_at','desc')->get();
    return view('pages.appraisal.viewListAppraisalTemplate',['appraisalsTemplate'=>$appraisalsTemplate]);
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
/*    print_r($request->oldQuestionId);
    echo $request->oldQuestionId[0];
    echo $request->oldQuestion[0];
    print_r($request->oldQuestion);
    break;*/
    $i=0;
    foreach($request->oldQuestionId as $idQuestion){
        $question = Question::where('id',$idQuestion)->get()->first();
        $question->question = $request->oldQuestion[$i];
        $question->save();
        $i++;
    }

    foreach ($request->question as $question){
      Question::create([
        'question' => $question,
        'appraisals_template_id' => $request->id,
    ]);
      }
      Session::flash('success', 'Appraisal Template was edited successfully');
    return back();
}
}

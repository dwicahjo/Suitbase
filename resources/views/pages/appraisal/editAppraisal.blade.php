@extends('layoutTemplate')
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Edit Appraisal Template</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
                @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
                @endforeach
            </ul>
        </div>
        @endif
        @if (Session::has('success'))
        <div class = "alert alert-success">
            {{ Session::get('success') }}
        </div>
        @endif
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-11">
                                <div class = "content-form">
                                    <form class = "form-horizontal" role="form" method="POST" action="{{ route('appraisal.update',['id' => $appraisalTemplate[0]->id]) }}">
                                        <div class="form-group">
                                            <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                            <label class="col-md-4 control-label" required>Title</label>
                                            <div class = "col-md-6">
                                                <input class="form-control" name = "title" value="{{$appraisalTemplate[0]->title}}" required>
                                                <input class="form-control" name = "id" type="hidden" value="{{$appraisalTemplate[0]->id}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Division</label>
                                            <div class = "col-md-6">
                                                <input class="form-control" name = "division_id" type="hidden" value="{{$appraisalTemplate[0]->division->id}}">
                                                <input class="form-control" name = "division_name" value="{{$appraisalTemplate[0]->division->name}}" disabled>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" required>Date Start</label>
                                            <div class = "col-md-6">
                                                <input class="form-control"type='date' name="date_start" value= "{{$appraisalTemplate[0]->date_start}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" required>Date End</label>
                                            <div class = "col-md-6">
                                                <input class="form-control" type='date'  name="date_end" value= "{{$appraisalTemplate[0]->date_end}}">
                                            </div>
                                        </div>
                                        @foreach($questions as $question)
                                        <input class= "form-control" type="hidden" name="oldQuestionId[]" value="{{$question->id}}">
                                        <div class="form-group" id="{{$question->id}}">
                                            <label class="col-md-4 control-label">Question </label>
                                            <div class = "col-md-6">
                                                <input class= "form-control" type="text" name="oldQuestion[]" value="{{$question->question}}" required>
                                                <span class = "input-group-btn"><button type="button" class="remove_field2 btn btn-danger" onclick="remove_question({{$question->id}})" >Remove</button></span>
                                           </div>
                                       </div>
                                       @endforeach
                                       <div id="wrap"></div>
                                       <button class="add-question add_field_button btn btn-default" id="addQuestionAppraisal" type="button">Add More Question</button>
                                       <div class="form-group">
                                        <div class="col-md-4"></div>
                                        <div class="col-md-6">
                                           <button type="submit" class="btn btn-default">Save</button>
                                       </div>
                                   </div>

                               </form>
                           </div>

                       </div>
                       <!-- /.row (nested) -->
                   </div>
                   <!-- /.panel-body -->
               </div>
               <!-- /.panel -->
           </div>
           <!-- /.col-lg-12 -->
       </div>
       <!-- /.row -->
   </div>
   <!-- /#wrapper -->
   @endsection

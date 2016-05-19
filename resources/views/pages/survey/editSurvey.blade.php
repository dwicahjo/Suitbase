@extends('layoutTemplate')
@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">EDIT SURVEY FORM</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
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
    @if (Session::has('fail'))
    <div class = "alert alert-danger">
        {{ Session::get('fail') }}
    </div>
    @endif
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class = "content-form">
                                <form class = "form-horizontal" role="form" method="POST" action="{{ route('survey.update',['id' => $surveyForm->id]) }}">
                                    <div class="form-group">
                                        <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                        <label class="col-md-4 control-label">Survey Title</label>
                                        <div class = "col-md-6">
                                            <input class="form-control" name = "title" value = "{{$surveyForm->title}}" required>
                                            <input class="form-control" name = "id" type="hidden" value="{{$surveyForm->id}}">
                                        </div>
                                    </div>

                                    <div class="form-group">
                                        <label class="col-md-4 control-label" required>Date Start</label>
                                        <div class = "col-md-6">
                                            <input class="form-control"type='date' name = "date_start" value="{{$surveyForm->date_start}}" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" required>Date End</label>
                                        <div class = "col-md-6">
                                            <input class="form-control" type='date' name = "date_end" value="{{$surveyForm->date_end}}" required>
                                        </div>
                                    </div>

                                    @foreach($questions as $question)
                                    <input class= "form-control" type="hidden" name="oldQuestionId[]" value="{{$question->id}}">
                                    <div id="{{$question->id}}">
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Question</label>
                                            <div class = "col-md-6">
                                                <textarea class ="form-control" name = "oldQuestion[]" required>{{$question->question}}</textarea>
                                                <input type="hidden" name="oldIdOption[]" value="{{$question->id}}">
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Question Type</label>
                                            <div class = "col-md-6">
                                                <select class="form-control select_menu" name = "oldQuestionType[]" id = "select_menu" onchange = "oldSelect(this.value,{{$question->id}});">
                                                   @if($question->question_type == 1)
                                                   <option value="text" selected>Text</option>
                                                   <option value="multiple-choice">Multiple Choice</option>
                                                   <option value="checkbox">Checkbox</option>
                                                   @elseif($question->question_type == 2)
                                                   <option value="text">Text</option>
                                                   <option value="multiple-choice" selected>Multiple Choice</option>
                                                   <option value="checkbox">Checkbox</option>
                                                   @else
                                                   <option value="text">Text</option>
                                                   <option value="multiple-choice">Multiple Choice</option>
                                                   <option value="checkbox" selected>Checkbox</option>
                                                   @endif
                                               </select>
                                           </div>
                                       </div>
                                       @if($question->question_type == 2)
                                       <div class="form-group" id="oldMultipleChoice{{$question->id}}" style="display:block">
                                        @else
                                        <div class="form-group" id="oldMultipleChoice{{$question->id}}" style="display:none">
                                            @endif
                                            <div class = "col-md-4 control-label">
                                            </div>
                                            <div class = "col-md-6 control-label">
                                                <?php $options = $question->option()->get();?>
                                                @foreach($options as $option)
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1">Option
                                                        <input class="form-control" name ="oldRadio{{$question->id}}[]" value="{{$option->option}}">
                                                    </label>
                                                    <span class = "input-group-btn"><button class="removeOption btn btn-danger" id ="">Remove Option</button></span>
                                                </div>
                                                @endforeach
                                                <div class="radio">
                                                    <label>
                                                        <button class="add-question add_field_button btn btn-default addOldOptionRadio" type="button" id="{{$question->id}}">Add More Option</button>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>
                                        @if($question->question_type == 3)
                                        <div class="form-group" id="oldCheckbox{{$question->id}}" style="display:block">
                                            @else
                                            <div class="form-group" id="oldCheckbox{{$question->id}}" style="display:none">
                                                @endif
                                                <div class = "col-md-4 control-label">
                                                </div>
                                                <div class="col-md-6">
                                                    <?php $options = $question->option()->get();?>
                                                    @foreach($options as $option)
                                                    <div class="checkbox">
                                                        <label>
                                                            <input type="checkbox" value="">Checkbox
                                                            <input class="form-control" name ="oldCheckbox{{$question->id}}[]" value="{{$option->option}}">
                                                        </label>
                                                        <span class = "input-group-btn"><button class="removeOption btn btn-danger" id ="">Remove Option</button></span>
                                                    </div>
                                                    @endforeach
                                                    <div class="checkbox">
                                                        <label>
                                                            <button class="add-question add_field_button btn btn-default addOldOptionCheckbox" type="button" id="{{$question->id}}">Add More Option</button>
                                                        </label>
                                                    </div>
                                                </div>
                                            </div>
                                            <button class="removeOldQuestion btn btn-danger" type="button" id ="{{$question->id}}">Remove Question</button>
                                        </div>
                                        @endforeach
                                    <div id="wrap"></div>
                                    <button class="add-question add_field_button btn btn-default" type="button" id="addQuestionSurvey">Add Question</button>
                                    <div class="form-group">
                                    <div class = "button-right">
                                        <button type="submit" class="btn btn-default">Save</button>
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

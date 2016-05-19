@extends('layoutTemplate')
@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Create Survey Form</h1>
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
                                <form class = "form-horizontal" role="form" method="POST" action="{{ route('survey.postCreate') }}">
                                    <div class="form-group">
                                        <input name="_token" type="hidden" value="{{ csrf_token() }}" >
                                        <label class="col-md-4 control-label">Survey Title</label>
                                        <div class = "col-md-6">
                                            <input class="form-control" name = "title" value = "{{ old('title') }}" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" required>Date Start</label>
                                        <div class = "col-md-6">
                                            <input class="form-control"type='date' name = "date_start" value = "{{ old('date_start') }}" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label" required>Date End</label>
                                        <div class = "col-md-6">
                                            <input class="form-control" type='date' name = "date_end" value = "{{ old('date_end') }}" required>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Question</label>
                                        <div class = "col-md-6">
                                            <textarea class ="form-control" name = "question[]" required/></textarea>
                                            <input type="hidden" name="idOption[]" value="0">
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Question Type</label>
                                        <div class = "col-md-6">
                                            <select class="form-control select_menu" name = "question_type[]" id = "select_menu" onchange = "select(this.value,0);">
                                                <option value="text">Text</option>
                                                <option value="multiple-choice">Multiple Choice</option>
                                                <option value="checkbox">Checkbox</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="form-group" id="multipleChoice0" style="display:none">
                                        <div class = "col-md-4 control-label">
                                        </div>
                                        <div class = "col-md-6 control-label">
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>Option
                                                    <input class="form-control" name = "radio0[]">
                                                </label>
                                            </div>
                                            <div class="radio">
                                                <label>
                                                    <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">Option
                                                    <input class="form-control" name = "radio0[]">
                                                </label>
                                            </div>
                                            <div id="wrapRadio"></div>
                                            <div class="radio">
                                                <label>
                                                    <button class="add-question add_field_button btn btn-default addOptionRadio" type="button" id="0">Add More Option</button>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-group" id="checkbox0" style="display:none">
                                        <div class = "col-md-4 control-label">
                                        </div>
                                        <div class="col-md-6">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">Checkbox
                                                    <input class="form-control" name = "checkbox0[]">
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">Checkbox
                                                    <input class="form-control" name = "checkbox0[]">
                                                </label>
                                            </div>

                                            <div class="checkbox">
                                                <label>
                                                    <button class="add-question add_field_button btn btn-default addOptionCheckbox" type="button" id="0">Add More Option</button>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    <div id="wrap"></div>
                                    <button class="add-question add_field_button btn btn-default" type="button" id="addQuestionSurvey">Add Question</button>
                                    <div class="form-group">
                                        <div class = "button-right">
                                            {{-- <button type="submit" class="btn btn-default">Close</button>
                                            <button type="submit" class="btn btn-default">Save</button> --}}
                                            <button type="submit" class="btn btn-default">Submit</button>
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

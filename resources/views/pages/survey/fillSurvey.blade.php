@extends('layoutTemplate')
@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">{{$survey->surveyform->title}}</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
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

                                <form class = "form-horizontal" role="form" method="POST" action="{{ route('survey.postFill',['id' => $survey->id]) }}">
                                    @foreach ($questions as $question)
                                    <div class="form-group">
                                        <label>(Question) {{$question->question}}</label>
                                        <input type="hidden" name="idQuestion[]" value="{{$question->id}}">
                                        @if($question->question_type == 1)
                                        <textarea class ="form-control" name = "text{{$question->id}}" required> </textarea>
                                        @elseif ($question->question_type == 2)
                                        @foreach ($question->option as $option)
                                        <div class="radio">
                                            <label>
                                                <input type="radio" name="radio{{$question->id}}" id="optionsRadios" value="{{$option->option}}">{{$option->option}}
                                            </label>
                                        </div>
                                        @endforeach
                                        @else
                                        @foreach ($question->option as $option)
                                        <div class="checkbox">
                                            <label>
                                            <input type="checkbox" name="checkbox{{$question->id}}[]" value="{{$option->option}}">{{$option->option}}
                                            </label>
                                        </div>
                                        @endforeach
                                        @endif
                                    </div>
                                    @endforeach
                                </div>
                                <div class = "button-right">
                                    <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                    <input type="hidden" name="idSurvey" value="{{$survey->id}}">
                                    <button type="submit" class="btn btn-default">Submit</button>
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

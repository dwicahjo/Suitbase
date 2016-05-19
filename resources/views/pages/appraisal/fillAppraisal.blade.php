@extends('layoutTemplate')
@section('content')

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">FILL APPRAISAL</h1>
            </div>

            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <!--<div class="panel-heading">
                        DataTables Advanced Tables
                    </div>-->
                    <!-- /.panel-heading -->
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
                    <div class = "header">
                        <label>Appraisee Name: </label> <label>{{$appraisal->employee->name}}</label></br>
                        <label>Division: </label> <label> {{$appraisal->division->name}}</label>
                    </div>
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <form class = "form-horizontal" role="form" method="POST" action="{{ route('appraisal.postFill',['id' => $appraisal->id]) }}">
                                <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                    <thead>
                                        <tr>
                                            <th>No. </th>
                                            <th>Question </th>
                                            <th>5 </th>
                                            <th>4 </th>
                                            <th>3 </th>
                                            <th>2</th>
                                            <th>1</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $j=1; ?>
                                        @foreach ($questions as $question)
                                        <tr class="odd gradeA">
                                            <td>{{$j}}</td>
                                            <td>{{$question->question}}</td>
                                            @for ($i=5; $i>0; $i--)
                                            @if($question->answers()->where('appraisals_id',$appraisal->id)->count() >0)
                                            @if($question->answers()->where('appraisals_id',$appraisal->id)->orderBy('created_at','desc')->first()->answer == $i)
                                            <td><input type="radio" name="answer[{{$question->id}}]"  value="{{$i}}" checked></td>
                                            @else
                                            <td><input type="radio" name="answer[{{$question->id}}]"  value="{{$i}}"></td>
                                            @endif
                                            @else
                                            <td><input type="radio" name="answer[{{$question->id}}]"  value="{{$i}}"></td>
                                            @endif
                                            @endfor
                                        </tr>
                                        <?php $j++; ?>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="form-group">
                                    <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                    <input name="appraisal_id" type="hidden" value="{{ $appraisal->id }}">
                                    <label class="col-md-4 control-label" required>Comment</label>
                                    <div class = "col-md-12">
                                        @if($appraisal->comment)
                                        <textarea class="form-control" name = "comment" required>{{$appraisal->comment}}</textarea>
                                        @else
                                        <textarea class="form-control" name = "comment" required></textarea>
                                        @endif
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-6">
                                        <button type="submit" class="btn btn-default">Submit</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <!-- /.table-responsive -->

                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

    </div>
    <!-- /#page-wrapper -->
    @endsection

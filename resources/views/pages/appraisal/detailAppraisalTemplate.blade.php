@extends('layoutTemplate')
@section('content')

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">DETAIL APPRAISAL TEMPLATE</h1>
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
                        <label>Division: </label> <label> {{$appraisalTemplate->division()->get()->first()->name}}</label>
                    </div>
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <form class = "form-horizontal" role="form">
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
                                            <td><input type="radio" name="answer[{{$question->id}}]"  value="{{$i}}" disabled></td>
                                            @endfor
                                        </tr>
                                        <?php $j++; ?>
                                        @endforeach
                                    </tbody>
                                </table>
                                <div class="form-group">
                                    <input name="_token" type="hidden" value="{{ csrf_token() }}">

                                    <label class="col-md-4 control-label" required>Comment</label>
                                    <div class = "col-md-12">
                                        <textarea class="form-control" name = "comment" disabled /></textarea>
                                    </div>
                                </div>
                                <div class="form-group">
                                    <div class="col-md-4"></div>
                                    <div class="col-md-6">
                                        <a href="{{ URL::previous() }}" class="btn btn-default" role="button">Back</a>
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

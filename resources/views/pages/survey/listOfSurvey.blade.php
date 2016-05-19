@extends('layoutTemplate')
@section('content')

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">LIST OF SURVEYS</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    @if (Session::has('success'))
        <div class = "alert alert-success">
            {{ Session::get('success') }}
        </div>
    @endif
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                </div>
                <!-- /.panel-heading -->
                <div class="menu-survey">
                    <a href="{{route('survey.create')}}">
                        <i class="fa fa-plus fa-fw"></i>
                        <label>
                            Create Survey
                        </label>
                    </a>
                </div>

                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Date Open </th>
                                    <th>Date Close</th>
                                    <th>Survey Title</th>
                                    <th>Employee Name</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $i=1; ?>
                                @foreach ($surveys as $survey)
                                <tr class="odd gradeA">
                                    <td>{{$i}}</td>
                                    <td>{{$survey->surveyForm->date_start}}</td>
                                    <td>{{$survey->surveyForm->date_end}}</td>
                                    <td>{{$survey->surveyForm->title}}</td>
                                    <td>{{$survey->employee->name}}</td>
                                    <td><a href="{{route('survey.detail',['id' =>$survey->id])}}" class="btn btn-default" role="button">Detail</a></td>
                                    <?php $i++; ?>
                                    @endforeach
                                </tbody>
                            </table>
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

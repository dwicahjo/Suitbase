@extends('layoutTemplate')
@section('content')

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">List of My Surveys</h1>
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
                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Date Open </th>
                                    <th>Date Close</th>
                                    <th>Survey Title</th>
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
                                    <th><a href="{{route('survey.fill',['id' =>$survey->id])}}" class="btn btn-default" role="button">Fill Survey</a></th>
                                </tr>
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

@extends('layoutTemplate')
@section('content')

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">RECAP OF APPRAISAL</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                </div>
                <!-- /.panel-heading -->
                {{-- <div class="menu-survey">
                    <a href="#">
                        <i class="fa fa-plus fa-fw"></i>
                        <label>
                            Create Survey
                        </label>
                    </a>
                </div> --}}

                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>Employee Name</th>
                                    <th>Average Score</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($appraisals as $appraisal)
                                    <tr class="odd gradeA">
                                        <td>{{ $appraisal->employee->name }}</td>
                                        @if($appraisal->average_score == 0)
                                            <td>Not Yet Filled</td>
                                        @else
                                            <td>{{ $appraisal->average_score }}</td>
                                        @endif
                                        <td><a href="{{route('appraisal.detail',['id' => $appraisal->id])}}" class="btn btn-default" role="button">Detail</a></td>
                                    </tr>
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

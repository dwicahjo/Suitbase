@extends('layoutTemplate')
@section('content')

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">My Appraisals</h1>
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
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th style="text-align: center">Period</th>
                                        <th style="text-align: center">Average Score</th>
                                    </tr>
                                </thead>
                                <tbody style="text-align: center">
                                    @foreach($appraisals as $appraisal)
                                        <tr class="odd gradeX">
                                            <td class="center">{{ date('M Y', strtotime($appraisal->appraisalsTemplate->date_start)) }}</td>
                                            @if($appraisal->average_score != 0)
                                                <td class="center">{{ $appraisal->average_score }}</td>
                                            @else
                                                <td class="center">Not Yet Filled</td>
                                            @endif
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

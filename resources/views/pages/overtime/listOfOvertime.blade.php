@extends('layoutTemplate')
@section('content')

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">LIST OF OVERTIME REQUESTS</h1>
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
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>No. </th>
                                        <th>Created At</th>
                                        <th>Date </th>
                                        <th>Employee Name </th>
                                        <th>Division</th>
                                        <th>Time Start</th>
                                        <th>Time End</th>
                                        <th>Total Hours</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; ?>
                                    @foreach ($overtimes as $overtime)
                                    <tr class="odd gradeA">
                                        <td>{{$i}}</td>
                                        <td>{{$overtime->created_at}}</td>
                                        <td>{{$overtime->date}}</td>
                                        <td>{{$overtime->username}}</td>
                                        <td>{{$overtime->division}}</td>
                                        <td>{{$overtime->time_start}}</td>
                                        <td>{{$overtime->time_end}}</td>
                                        <td>{{$overtime->time_end - $overtime->time_start}}</td>
                                        <td><a href="{{ route('overtime.approval', $overtime->id) }}">{{$overtime->status}}</td>
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
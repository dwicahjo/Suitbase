@extends('layoutTemplate')
@section('content')

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">MY OVERTIME REQUESTS</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                    </div>
                    <!--<div class="panel-heading">
                        DataTables Advanced Tables
                    </div>-->
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>No. </th>
                                        <th>Date</th>
                                        <th>Start Time</th>
                                        <th>End Time</th>
                                        <th>Total Hours</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; ?>
                                    @foreach ($overtimes as $overtime)
                                    <tr class="odd gradeA">
                                        <td><a href='/overtimeDetails:{{$overtime->id}}'>{{$i}}</td>
                                        <td>{{$overtime->date}}</td>
                                        <td>{{$overtime->time_start}}</td>
                                        <td>{{$overtime->time_end}}</td>
                                        <td>{{$overtime->total_hours}}</td>
                                        <td>{{$overtime->status}}</td>
                                        <?php 
                                            $status = explode(" ", $overtime->status);
                                        ?>
                                        @if ($status[0] == "Rejected" || $status[0] == "Approved" || $status[0] == "Cancelled")
                                            <th>
                                                <button type="submit" class="btn btn-default btn-info" disabled="">Edit</button>
                                                <button type="submit" class="btn btn-default btn-danger" disabled="">Cancel</button>
                                            </th>
                                        @else
                                            <th><a href="/editOvertime:{{ $overtime->id }}" class="btn btn-default btn-info" role="button">Edit</a>
                                            <a href="/cancelOvertime:{{ $overtime->id }}" class="btn btn-default btn-danger" role="button">Cancel</a></th>
                                        @endif
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
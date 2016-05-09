@extends('layoutTemplate')
@section('content')

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">LIST OF TRAINING REQUESTS</h1>
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
                        <div class="dataTable_wrapper disini?">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>No. </th>
                                        <th>Created At</th>
                                        <th>Employee Name</th>
                                        <th>Date </th>
                                        <th>Division </th>
                                        <th>Training Title</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; ?>
                                    @foreach ($trainings as $training)
                                    <tr class="odd gradeA">
                                        <td>{{$i}}</td>
                                        <td>{{$training->created_at}}</td>
                                        <td>{{$training->username}}</td>
                                        <td>{{$training->date}}</td>
                                        <td>{{$training->division}}</td>
                                        <td>{{$training->title}}</a></td>
                                        <td><a href="/trainingApproval:{{$training->id}}">{{$training->status}}</td>
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

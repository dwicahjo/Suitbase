@extends('layoutTemplate')
@section('content')

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">MY TRAINING REQUESTS</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        @if (Session::has('success'))
            <div class = "alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif
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
                                        <th>No. </th>
                                        <th>Created At</th>
                                        <th>Date</th>
                                        <th>Training Title</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; ?>
                                    @foreach ($trainings as $training)
                                    <tr class="odd gradeA">
                                        <td>{{$i}}</td>
                                        <td>{{ $training->created_at }}</td>
                                        <td>{{ $training->date }}</td>
                                        <td>{{$training->title}}</a></td>
                                        <td>{{$training->status}}</td>
                                        <?php 
                                                $status = explode(" ", $training->status);
                                            ?>
                                        @if ($status[0] == "Rejected" || $status[0] == "Approved" || $status[0] == "Cancelled")
                                            <th>
                                                <a href="{{ route('trainings.details', $training->id) }}" class="btn btn-default" role="button">Detail</a>
                                                <button type="submit" class="btn btn-default btn-info" disabled="">Edit</button>
                                                <button type="submit" class="btn btn-default btn-danger" disabled="">Cancel</button>
                                            </th>
                                        @else
                                            <th>
                                            <a href="{{ route('trainings.details', $training->id) }}" class="btn btn-default" role="button">Detail</a>
                                            <a href="{{ route('trainings.edit', $training->id) }}" class="btn btn-default btn-info" role="button">Edit</a>
                                            <a href="{{ route('trainings.cancel', $training->id) }}" class="btn btn-default btn-danger cancel" role="button">Cancel</a></th>
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
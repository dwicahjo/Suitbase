@extends('layoutTemplate')
@section('content')

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Recap of Request</h1>
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
                                    <th>Department</th>
                                    <th>Total Leave Request</th>
                                    <th>Total Training Request</th>
                                    <th>Total Procurement Request</th>
                                    <th>Total Remote Working Request</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach($recap as $data)
                                    <tr class="odd gradeA">
                                        <td>{{ $data->department }}</td>
                                        <td>{{ $data->total_leaves }}</td>
                                        <td>{{ $data->total_trainings }}</td>
                                        <td>{{ $data->total_procurements }}</td>
                                        <td>{{ $data->total_remotes }}</td>
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

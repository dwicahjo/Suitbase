@extends('layoutTemplate')
@section('content')

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">LIST OF PROCUREMENTS REQUESTS</h1>
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

                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>No. </th>
                                        <th>Created At</th>
                                        <th>Employee Name</th>
                                        <th>Division </th>
                                        <th>Title</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach ($procurements as $procurement)
                                    <tr class="odd gradeX">
                                        <td>{{ $i }}</td>
                                        <td>{{ $procurement->created_at }}</td>
                                        <td>{{ $procurement->employee->name }}</a></td>
                                        <td>{{ $procurement->employee->division->name }}</td>
                                        <td>{{ $procurement->title }}</td>
                                        <td>{{ $procurement->status }}</td>
                                        <th><a href="{{ route('procurements.approval', $procurement->id) }}" class="btn btn-default" role="button">Detail</a></th>
                                    </tr>
                                    <?php $i++; ?>
                                    @endforeach
                                    {{ $procurements->render() }}
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
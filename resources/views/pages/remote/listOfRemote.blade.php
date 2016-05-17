@extends('layoutTemplate')
@section('content')

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">LIST OF REMOTE WORKING REQUEST</h1>
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
                                        <th>Employee Name </th>
                                        <th>Division </th>
                                        <th>Start Date </th>
                                        <th>End Date </th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1 ?>
                                    @foreach ($remotes as $remote)
                                        <tr class="odd gradeX">
                                            <td>{{ $i }}</td>
                                            <td>{{ $remote->created_at }}</td>
                                            <td>{{ $remote->employee->name }}</a></td>
                                            <td>{{ $remote->employee->division->name }}</td>
                                            <td>{{ $remote->date_start }}</td>
                                            <td>{{ $remote->date_end}}</td>
                                            <td>{{ $remote->status }}</td>
                                            <th><a href="{{ route('remotes.approval', $remote->id) }}" class="btn btn-default" role="button">Detail</a></th>
                                        </tr>
                                        <?php $i++; ?>
                                    @endforeach
                                    {{ $remotes->render() }}
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


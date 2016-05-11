 @extends('layoutTemplate')
@section('content')

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">LIST OF LEAVE REQUESTS</h1>
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
                                        <th>Name </th>
                                        <th>Division </th>
                                        <th>Start Date </th>
                                        <th>End Date </th>
                                        <th>Leave Type</th>
                                        <th>Status</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach ($leaves as $leave)
                                        <tr class="odd gradeX">
                                            <td>{{ $i }}</td>
                                            <td>{{ $leave->created_at }}</td>
                                            <td>{{ $leave->username }}</td>
                                            <td>{{ $leave->division }}</td>
                                            <td class="center"> {{ $leave->date_start }}</td>
                                            <td class="center"> {{ $leave->date_end }} </td>
                                            <td>{{ $leave->type }}</td>
                                            <td><a href="{{ route('leaves.approval', $leave->id) }}">{{ $leave->status }}</td>
                                        </tr>
                                        <?php $i++; ?>
                                    @endforeach
                                  {{--   {{ $leaves->render() }} --}}
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

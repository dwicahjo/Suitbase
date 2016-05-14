@extends('layoutTemplate')
@section('content')

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">MY REMOTE WORKING REQUESTS</h1>
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
                                        <th>Start Date</th>
                                        <th>End Date</th>
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
                                            <td>{{ $remote->date_start }}</td>
                                            <td>{{ $remote->date_end }}</td>
                                            <td class="center"><a href="{{ route('remotes.details', $remote->id) }}">{{ $remote->status }}</a></td>
                                            <?php 
                                                $status = explode(" ", $remote->status);
                                            ?>
                                            @if ($status[0] == "Rejected" || $status[0] == "Approved" || $status[0] == "Cancelled")
                                                <th>
                                                    <button type="submit" class="btn btn-default btn-info" disabled="">Edit</button>
                                                    <button type="submit" class="btn btn-default btn-danger" disabled="">Cancel</button>
                                                </th>
                                            @else
                                                <th><a href="{{ route('remotes.edit', $remote->id) }}" class="btn btn-default btn-info" role="button">Edit</a>
                                                <a href="{{ route('remotes.cancel', $remote->id) }}" class="btn btn-default btn-danger cancel" role="danger">Cancel</a></th>
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
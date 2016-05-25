@extends('layoutTemplate')
@section('content')

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">LIST OF USERS</h1>
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
                                        <th>No.</th>
                                        <th>Division</th>
                                        <th>Name</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; ?>
                                    @foreach($users as $user)
                                        @if($user->name != 'Admin')
                                            <tr class="odd gradeA">
                                            <td>{{$i}}</td>
                                            <td>{{$user->division}}</td>
                                            <td>{{$user->name}} </a></td>
                                            <td>{{ $user->status }}</td>
                                            <th>
                                                <a href="{{ route('user.details', $user->id) }}" class="btn btn-default btn-edit" role="button">Details</a>
                                                @if(Auth::user()->type == 'Admin')
                                                    <a href="{{ route('user.edit', $user->id) }}" class="btn btn-default btn-info" role="button">Edit</a>
                                                @endif
                                                <a href="{{ route('user.reset', $user->id) }}" class="btn btn-default btn-danger" role="button">Reset</a>
                                            </th>
                                        </tr>
                                        <?php $i++; ?>
                                        @endif
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

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
                                        <th>Division </th>
                                        <th>Name </th>
                                        <th> </th>

                                    </tr>
                                </thead>
                                <tbody>
                                   <?php $i=1; ?>
                                    @foreach($users as $user)
                                    <tr class="odd gradeA">
                                        <td>{{$i}}</td>
                                        <td>{{$user->division}}</td>
                                        <td><a href="/userDetails:{{ $user->id }}"> {{$user->name}} </a></td>
                                        <th><a href="/editProfile:{{ $user->id }}" class="btn btn-default btn-info" role="button">Edit</a>
                                            <a href="/resetUser:{{ $user->id }}" class="btn btn-default btn-danger" role="button">Reset</a></th>
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

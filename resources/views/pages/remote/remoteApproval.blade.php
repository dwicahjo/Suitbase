@extends('layoutTemplate')
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">REMOTE WORKING DETAIL</h1>
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
            <div class="col-lg-2">
            </div>
            <div class="col-lg-8 detail">
                <div class="panel panel-default">
                    <div class="panel-heading">
                    </div>
                    <div class="panel-body">
                        <div class = "content">
                            <form class = "form-horizontal">
                                <div class = "form-group">
                                    <label class="col-md-4 control-label">Name</label>
                                    <div class = "right-side">
                                        <label class="col-md-6">: {{ $remotes[0]->employee->name }}</label>
                                    </div>
                                </div>
                                <div class = "form-group">
                                    <label class="col-md-4 control-label">Divison</label>
                                    <div class = "right-side">
                                        <label class="col-md-6">: {{ $remotes[0]->employee->division->name }}</label>
                                    </div>
                                </div>
                                <div class = "form-group">
                                    <label class="col-md-4 control-label">Start Date</label>
                                    <div class = "right-side">
                                        <label class="col-md-6">: {{ $remotes[0]->date_start }}</label>
                                    </div>
                                </div>
                                <div class = "form-group">
                                    <label class="col-md-4 control-label">End Date</label>
                                    <div class = "right-side">
                                        <label class="col-md-6">: {{ $remotes[0]->date_end }}</label>
                                    </div>
                                </div>
                                <div class = "form-group">
                                        <label class="col-md-4 control-label">Description </label>
                                    <div class = "right-side">
                                        <label class="col-md-6">: {{ $remotes[0]->description }}</label>
                                    </div>
                                </div>
                                <div class = "form-group">
                                        <label class="col-md-4 control-label">Status </label>
                                    <div class = "right-side">
                                        <label class="col-md-6">: {{ $remotes[0]->status }}</label>
                                    </div>
                                </div>
                            </form>
                            <div class="form-group">
                                <div class="col-lg-6 col-md-offset-2">
                                    <a href="{{ route('remotes.list.all') }}" class="btn btn-default" role="button">Back</a>
                                <?php 
                                    $status = explode(" ", $remotes[0]->status);
                                ?>
                                @if ($status[0] == "Cancelled")
                                    <button class="btn btn-default btn-danger" disabled>Reject</button>
                                    <button class="btn btn-default btn-info" disabled>Approve</button>
                                @else   
                                    <a href="{{ route('remotes.approval.reject', $remotes[0]->id) }}" class="btn btn-default btn-danger approval" role="button">Reject</a>
                                    <a href="{{ route('remotes.approval.approve', $remotes[0]->id) }}" class="btn btn-default btn-info approval" role="button">Approve</a>
                                @endif
                            </div>
                            </div>
                            <!--row-->
                        </div>
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /#wrapper -->
    @endsection
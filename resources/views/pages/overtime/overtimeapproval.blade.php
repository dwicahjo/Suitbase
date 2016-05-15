@extends('layoutTemplate')
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">OVERTIME DETAIL</h1>
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
            <div class="col-lg-4">
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
                                        <label class="col-md-6">: {{$overtimes[0]->username}}</label>
                                    </div>
                                </div>
                                <div class = "form-group">
                                    <label class="col-md-4 control-label">Divison</label>
                                    <div class = "right-side">
                                        <label class="col-md-6">: {{$overtimes[0]->division}}</label>
                                    </div>
                                </div>
                                <div class = "form-group">
                                    <label class="col-md-4 control-label">Date </label>
                                    <div class = "right-side">
                                        <label class="col-md-6">: {{$overtimes[0]->date}}</label>
                                    </div>
                                </div>
                                <div class = "form-group">
                                    <label class="col-md-4 control-label">Time Start</label>
                                    <div class = "right-side">
                                        <label class="col-md-6">: {{$overtimes[0]->time_start}}</label>
                                    </div>
                                </div>
                                <div class = "form-group">
                                    <label class="col-md-4 control-label">Time End</label>
                                    <div class = "right-side">
                                        <label class="col-md-6">: {{$overtimes[0]->time_end}}</label>
                                    </div>
                                </div>
                                <div class = "form-group">
                                    <label class="col-md-4 control-label">Total Hours </label>
                                    <div class = "right-side">
                                        <label class="col-md-6">: {{$overtimes[0]->time_end - $overtimes[0]->time_start}}</label>
                                    </div>
                                </div>
                                <div class = "form-group">
                                        <label class="col-md-4 control-label">Description </label>
                                    <div class = "right-side">
                                        <label class="col-md-6">: {{$overtimes[0]->description}} </label>
                                    </div>
                                </div>
                                <div class = "form-group">
                                    <label class="col-md-4 control-label">Status </label>
                                    <div class = "right-side">
                                        <label class="col-md-6">: {{$overtimes[0]->status}} </label>
                                    </div>
                                </div>
                            </form>
                            <div class="form-group">
                                <div class="col-lg-6 col-md-offset-2">
                                    <a href="{{ route('overtime.list.all') }}" class="btn btn-default" role="button">Back</a>
                                <?php 
                                    $status = explode(" ", $overtimes[0]->status);
                                ?>
                                @if ($status[0] == "Rejected" || $status[0] == "Approved" || $status[0] == "Cancelled")
                                    <button class="btn btn-default btn-danger" disabled>Reject</button>
                                    <button class="btn btn-default btn-info" disabled>Approve</button>
                                @else
                                    <a href="{{ route('overtime.approval.reject', $overtimes[0]->id) }}" class="btn btn-default btn-danger approval" role="button">Reject</a>
                                    <a href="{{ route('overtime.approval.approve', $overtimes[0]->id) }}" class="btn btn-default btn-info approval" role="button">Approve</a>
                                @endif
                                </div>
                            </div>
                        </div><!--content-->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-8 -->
        </div>
        <!-- /.row -->
    </div>
    <!-- /#wrapper -->
    @endsection
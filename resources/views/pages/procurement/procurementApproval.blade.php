@extends('layoutTemplate')
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">PROCUREMENT DETAIL</h1>
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
                                        <label class="col-md-6">: {{ $procurements[0]->employee->name }}</label>
                                    </div>
                                </div>
                                <div class = "form-group">
                                    <label class="col-md-4 control-label">Divison</label>
                                    <div class = "right-side">
                                        <label class="col-md-6">: {{ $procurements[0]->employee->division->name }}</label>
                                    </div>
                                </div>
                                <div class = "form-group">
                                    <label class="col-md-4 control-label"> Title </label>
                                    <div class = "right-side">
                                        <label class="col-md-6">: {{ $procurements[0]->title }}</label>
                                    </div>
                                </div>
                                <div class = "form-group">
                                    <label class="col-md-4 control-label">Price Estimate</label>
                                    <div class = "right-side">
                                        <label class="col-md-6">: Rp {{ number_format($procurements[0]->estimate_price,2,',','.') }}</label>
                                    </div>
                                </div>
                                <div class = "form-group">
                                        <label class="col-md-4 control-label">Description </label>
                                    <div class = "right-side">
                                        <label class="col-md-6">: {{ $procurements[0]->description }}</label>
                                    </div>
                                </div>
                                <div class = "form-group">
                                    <label class="col-md-4 control-label">Status </label>
                                    <div class = "right-side">
                                        <label class="col-md-6">: {{ $procurements[0]->status }}</label>
                                    </div>
                                </div>
                            </form>
                            <div class="form-group">
                                <div class="col-lg-6 col-md-offset-2">
                                    <a href="{{ route('procurements.list.all') }}" class="btn btn-default" role="button">Back</a>
                                <?php 
                                    $status = explode(" ", $procurements[0]->status);
                                ?>
                                @if ($status[0] == "Rejected" || $status[0] == "Approved" || $status[0] == "Cancelled")
                                    <button class="btn btn-default btn-danger" disabled>Reject</button>
                                    <button class="btn btn-default btn-info" disabled>Approve</button>
                                @else
                                    <a href="{{ route('procurements.approval.reject', $procurements[0]->id) }}" class="btn btn-default btn-danger approval" role="button">Reject</a>
                                    <a href="{{ route('procurements.approval.approve', $procurements[0]->id) }}" class="btn btn-default btn-info approval" role="button">Approve</a>
                                @endif
                                </div>
                            </div>
                            <!--row-->
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
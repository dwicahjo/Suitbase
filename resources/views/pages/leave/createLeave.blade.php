@extends('layoutTemplate')
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">CREATE LEAVE REQUEST</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row">
            <div class="col-lg-12 ">
                <div class="panel panel-default">
                    <div class="panel-heading">
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class = "content-form">
                                    <form class = "form-horizontal" role="form" method="post" action="/storeLeave">
                                        <div class="form-group">
                                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                            <label class="col-md-4 control-label">Start Date</label>
                                            <div class = "col-md-6">
                                            <input class="form-control" name = "startdate" type = "date" value = "{{ old('startdate') }}" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">End Date</label>
                                            <div class = "col-md-6">
                                                <input class="form-control" name = "enddate" type = "date" value = "{{ old('enddate') }}" required>
                                            </div> 
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Leave Type</label>
                                            <div class = "col-md-6">
                                                <select class="form-control" name = "leavetype" required>
                                                    @if (Auth::user()->number_leave <= 0)
                                                        <option>Unpaid</option>
                                                    @else
                                                        @if (old('leavetype') == 'Sick')
                                                            <option selected>Sick</option>
                                                            <option>Maternal</option>
                                                            <option>Marriage</option>
                                                        @elseif (old('leavetype') == 'Maternal')
                                                            <option>Sick</option>
                                                            <option selected>Maternal</option>
                                                            <option>Marriage</option>
                                                        @elseif (old('leavetype') == 'Marriage')
                                                            <option>Sick</option>
                                                            <option>Maternal</option>
                                                            <option selected>Marriage</option>
                                                        @else
                                                            <option>Sick</option>
                                                            <option>Maternal</option>
                                                            <option>Marriage</option>
                                                        @endif
                                                    @endif
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Reason</label>
                                            <div class = "col-md-6">
                                                <textarea class ="form-control" name = "reason" required>{{ old('reason') }}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-6 col-md-offset-4">
                                                <a href="listOfLeave" class="btn btn-primary btn-left" role="button">Submit</a>
                                                <a href="listOfLeave" class="btn btn-primary" role="button">Back</a>
                                        </div>
                                    </form>
                                </div>
                            </div>
                            
                        </div>
                        <!-- /.row (nested) -->
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
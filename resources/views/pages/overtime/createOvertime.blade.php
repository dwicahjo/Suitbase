@extends('layoutTemplate')
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">CREATE OVERTIME REQUEST</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12 ">
                <div class="panel panel-default">
                    <div class="panel-heading">
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class = "content-form">
                                <form class = "form-horizontal" role="form" method="POST" action="{{ url('/createOvertime') }}">
                                        <div class="form-group">
                                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                            <label class="col-md-4 control-label" style = "{{ $errors->has('date') ? 'color:red' : '' }}">Date</label>
                                            <div class = "col-md-6">
                                                <input class="form-control" name = "date" type = "date" value = "{{ old('date') }}" required>
                                                @if ($errors->has('title'))
                                                    <span class="help-block">
                                                        <strong style = "{{ $errors->has('title') ? 'color:red' : '' }}">{{ $errors->first('title') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" style = "{{ $errors->has('starttime') ? 'color:red' : '' }}">Start Time</label>
                                            <div class = "col-md-6">
                                                <input class="form-control" name = "starttime" type = "time" value = "{{ old('starttime') }}" required>
                                                @if ($errors->has('starttime'))
                                                    <span class="help-block">
                                                        <strong style = "{{ $errors->has('starttime') ? 'color:red' : '' }}">{{ $errors->first('starttime') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label" style = "{{ $errors->has('endtime') ? 'color:red' : '' }}">End Time</label>
                                            <div class = "col-md-6">
                                                <input class="form-control" name = "endtime" type = "time" value = "{{ old('endtime') }}" required>
                                                @if ($errors->has('endtime'))
                                                    <span class="help-block">
                                                        <strong style = "{{ $errors->has('endtime') ? 'color:red' : '' }}">{{ $errors->first('endtime') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label" style = "{{ $errors->has('description') ? 'color:red' : '' }}">Description</label>
                                            <div class = "col-md-6">
                                                <textarea class ="form-control" name = "description" required>{{ old('description') }}</textarea>
                                                @if ($errors->has('description'))
                                                    <span class="help-block">
                                                        <strong style = "{{ $errors->has('description') ? 'color:red' : '' }}">{{ $errors->first('description') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <input class="form-control" name = "employees_id" type = "hidden" value='{{Auth::user()->id}}'>
                                        <input class="form-control" name = "status" type = "hidden" value='Submitted'>
                                        <div class="form-group">
                                            <div class="col-md-5 control-label"></div>
                                            <div class = "col-md-2 col-md-offset-3">
                                                <button type="submit" class="btn btn-default">Submit</button>
                                            </div>
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

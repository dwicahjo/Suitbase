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
        <div class="row">
            <div class="col-lg-12 ">
                <div class="panel panel-default">
                    <div class="panel-heading">
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-12">
                                <div class = "content-form">
                                    <form class = "form-horizontal" role="form" method="post" action="{{route('leaves.postCreate')}}">
                                        <div class="form-group">
                                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                            <label class="col-md-4 control-label" style = "{{ $errors->has('startdate') ? 'color:red' : '' }}">Start Date</label>
                                            <div class = "col-md-6">
                                                <input class="form-control" name = "startdate" type = "date" value = "{{ old('startdate') }}" required>
                                                @if ($errors->has('startdate'))
                                                    <span class="help-block">
                                                        <strong style = "{{ $errors->has('startdate') ? 'color:red' : '' }}">{{ $errors->first('startdate') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" style = "{{ $errors->has('enddate') ? 'color:red' : '' }}"
                                            >End Date</label>
                                            <div class = "col-md-6">
                                                <input class="form-control" name = "enddate" type = "date" value = "{{ old('enddate') }}" required>
                                                @if ($errors->has('enddate'))
                                                    <span class="help-block">
                                                        <strong style = "{{ $errors->has('enddate') ? 'color:red' : '' }}">{{ $errors->first('enddate') }}</strong>
                                                    </span>
                                                @endif
                                            </div> 
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" style = "{{ $errors->has('leavetype') ? 'color:red' : '' }}">Leave Type</label>
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
                                                @if ($errors->has('leavetype'))
                                                    <span class="help-block">
                                                        <strong style = "{{ $errors->has('leavetype') ? 'color:red' : '' }}">{{ $errors->first('leavetype') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label" style = "{{ $errors->has('reason') ? 'color:red' : '' }}">Reason</label>
                                            <div class = "col-md-6">
                                                <textarea class ="form-control" name = "reason" required>{{ old('reason') }}</textarea>
                                                @if ($errors->has('reason'))
                                                    <span class="help-block">
                                                        <strong style = "{{ $errors->has('reason') ? 'color:red' : '' }}">{{ $errors->first('reason') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-6 col-md-offset-4">
                                                <button type="submit" class="btn btn-primary">
                                                    Submit
                                                </button>
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
@extends('layoutTemplate')
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">CREATE REMOTE WORKING REQUEST</h1>
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
                                    <form class = "form-horizontal" role="form" method="post" action="/storeRemote">
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
                                            <label class="col-md-4 control-label" style = "{{ $errors->has('enddate') ? 'color:red' : '' }}">End Date</label>
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
                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-4">
                                                <button type="submit" class="btn btn-primary">
                                                    Submit
                                                </button>
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

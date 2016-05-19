@extends('layoutTemplate')
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">EDIT OVERTIME REQUEST</h1>
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
                        <div class="row">
                            <div class="col-lg-12">
                                <div class = "content-form">
                                    <form class = "form-horizontal" role="form" method = "post" action = "{{ route('overtime.postEdit') }}">
                                        <div class="form-group">
                                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                            <input class="form-control" name = "id" type = "hidden" value = "{{ $overtimes[0]->id }}">
                                            <label class="col-md-4 control-label">Date</label>
                                            <div class = "col-md-6">
                                                <input class="form-control" name = "date" type = "date" value = "{{ $overtimes[0]->date }}" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Start Time</label>
                                            <div class = "col-md-6">
                                                <input class="form-control" name = "starttime" type = "time" value = "{{ $overtimes[0]->time_start }}" required>
                                            </div> 
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">End Time</label>
                                            <div class = "col-md-6">
                                                <input class="form-control" name = "endtime" type = "time" value = "{{ $overtimes[0]->time_end }}" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Reason</label>
                                            <div class = "col-md-6">
                                                <textarea class ="form-control" name = "description" required>{{ $overtimes[0]->description }}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-1 col-md-offset-8 btn-submit-back">
                                                <button type="submit" class="btn btn-primary">Submit</button>                                                
                                                <a href="{{ route('overtime.list.current') }}" class="btn btn-default btn-left" role="button">Back</a>
                                            </div>
                                        </div>
                                    </form>
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

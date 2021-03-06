@extends('layoutTemplate')
@section('content')

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">EDIT LEAVE REQUEST</h1>
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
                                    <form class = "form-horizontal" role="form" method = "post" action = "{{ route('leaves.postEdit') }}">
                                        <div class="form-group">
                                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                            <input class="form-control" name = "id" type = "hidden" value = "{{ $leaves[0]->id }}">
                                            <label class="col-md-4 control-label">Start Date</label>
                                            <div class = "col-md-6">
                                                <input class="form-control" name = "startdate" type = "date" value = "{{ $leaves[0]->date_start }}" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">End Date</label>
                                            <div class = "col-md-6">
                                                <input class="form-control" name = "enddate" type = "date" value = "{{ $leaves[0]->date_end }}" required>
                                            </div> 
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Leave Type</label>
                                            <div class = "col-md-6">
                                                <select class="form-control" name = "leavetype" required>
                                                    @if ($leaves[0]->type == 'Sick')
                                                        <option selected>Sick</option>
                                                        <option>Maternal</option>
                                                        <option>Marriage</option>
                                                    @elseif ($leaves[0]->type == 'Maternal')
                                                        <option>Sick</option>
                                                        <option selected>Maternal</option>
                                                        <option>Marriage</option>
                                                    @elseif ($leaves[0]->type == 'Marriage')
                                                        <option>Sick</option>
                                                        <option>Maternal</option>
                                                        <option selected>Marriage</option>
                                                    @elseif ($leaves[0]->type == 'Unpaid')
                                                        <option>Unpaid</option>
                                                    @endif
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Reason</label>
                                            <div class = "col-md-6">
                                                <textarea class ="form-control" name = "reason" required>{{ $leaves[0]->description }}</textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-1 col-md-offset-8 btn-submit-back">
                                                <button type="submit" class="btn btn-primary">Submit</button>                                                
                                                <a href="{{ route('leaves.list.current') }}" class="btn btn-default btn-left" role="button">Back</a>
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
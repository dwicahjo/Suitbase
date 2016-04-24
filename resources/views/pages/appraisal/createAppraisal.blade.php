@extends('layoutTemplate')
<body>
	@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Create Appraisal Form</h1>
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
        @if (Session::has('fail'))
        <div class = "alert alert-danger">
            {{ Session::get('fail') }}
        </div>
        @endif
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-11">
                                <div class = "content-form">
                                    <form class = "form-horizontal" role="form" method="POST" action="{{ route('appraisal.postCreate') }}">
                                        <div class="form-group">
                                            <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                            <label class="col-md-4 control-label" required>Title</label>
                                            <div class = "col-md-6">
                                                <input class="form-control" name = "title" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Division</label>
                                            <div class = "col-md-6">
                                                <select class="form-control" name = "division_id">
                                                    @foreach ($divisions as $division)
                                                    <option value="{{$division->id}}"> {{$division->name}} </option>
                                                    @endforeach
                                                </select>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" required>Date Start</label>
                                            <div class = "col-md-6">
                                                <input class="form-control"type='date' name = "date_start" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" required>Date End</label>
                                            <div class = "col-md-6">
                                                <input class="form-control" type='date' name = "date_end" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Question </label>
                                            <div class = "col-md-6">
                                             <input class= "form-control" type="text" name="question[]" required>
                                         </div>
                                     </div>
                                     <div id="wrap"></div>
                                     <button class="add-question add_field_button btn btn-default" type="button">Add Question</button>
                                     <div class="form-group">
                                        <div class="col-md-5 control-label"></div>
                                        <div class = "col-md-2 col-md-offset-3">
                                            <button type="submit" class="save btn btn-default">Save</button>
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


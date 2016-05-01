@extends('layoutTemplate')
<!DOCTYPE html>
<html lang="en">

<head>

</head>

<body>
	@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <h1 class="page-header">CREATE ACCOUNT</h1>
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
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">
                    </div>
                    <div class="panel-body">
                        <!-- <div class="row">
                            <div class="col-lg-12"> -->
                        <form class="form-horizontal" role="form" enctype="multipart/form-data" method="POST" action="{{ url('/createAccount') }}">
                        <input name="_token" type="hidden" value="{{ csrf_token() }}">

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}" required>

                                @if ($errors->has('name'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('name') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">E-Mail Address</label>

                            <div class="col-md-6">
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}" required>

                                @if ($errors->has('email'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password" required>

                                @if ($errors->has('password'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Confirm Password</label>

                            <div class="col-md-6">
                                <input type="password" class="form-control" name="password_confirmation" required>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Department</label>
                                <div class="col-md-6">
                                    <select class="form-control" name = "departments_id">
                                        <?php
                                            foreach ($departments as $department) {
                                            echo '<option value="'.$department->id.'">'.$department->name.'</option>';
                                        }?>
                                    </select>
                                </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Division</label>
                                <div class="col-md-6">
                                    <select class="form-control" name = "divisions_id">
                                        <?php
                                            foreach ($divisions as $division) {
                                            echo '<option value="'.$division->id.'">'.$division->name.'</option>';
                                        }?>
                                    </select>
                                </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">User Type</label>
                                <div class="col-md-6">
                                    <select class="form-control" name = "type">
                                        <option value='HR'>HR</option>
                                        <option value='Supervisor'>Supervisor</option>
                                        <option value='Finance'>Finance</option>
                                        <option value='User'>Employee</option>
                                    </select>
                                </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Supervisor</label>
                                <div class="col-md-6">
                                    <select class="form-control" name = "supervisor">
                                        <?php
                                            foreach ($supervisors as $supervisor) {
                                            echo '<option value="'.$supervisor->id.'">'.$supervisor->name.'</option>';
                                        }?>
                                    </select>
                                </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Birth Place</label>
                                <div class="col-md-6">
                                    <input class="form-control" name = "birth_place" type = "text"required>
                                </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Birth Date</label>
                                <div class="col-md-6">
                                    <input class="form-control" name = "birth_date" type ="date" required>
                                </div>
                        </div>

                       <div class="form-group">
                            <label class="col-md-4 control-label">Gender</label>
                             <div class="col-md-6">
                                <select class="form-control" name = "gender">
                                   <option value="Male">Male</option>
                                   <option value="Female">Female</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Religion</label>
                                <div class="col-md-6">
                                    <input class="form-control" name = "religion" type = "text" required>
                                </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">KTP Number</label>
                                <div class="col-md-6">
                                    <input class="form-control" name = "ktp_id" type = "text" required>
                                </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">NPWP Number</label>
                                <div class="col-md-6">
                                    <input class="form-control" name = "NPWP" type = "text" required>
                                </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">KTP Address</label>
                                <div class="col-md-6">
                                    <input class="form-control" name = "ktp_address" type = "text" required>
                                </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Phone</label>
                                <div class="col-md-6">
                                    <input class="form-control" name = "phone" type = "text" required>
                                </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Current Address</label>
                                <div class="col-md-6">
                                    <input class="form-control" name = "address" type = "text" required>
                                </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Curricullum Vitae</label>
                                <div class="col-md-6">
                                    <input name="CV" type="file" class="upload" />
                                </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">KTP</label>
                                <div class="col-md-6">
                                    <input name="KTP" type="file" class="upload" />
                                </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Ijazah</label>
                                <div class="col-md-6">
                                    <input name="ijazah" type="file" class="upload" />
                                </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Kartu Keluarga</label>
                                <div class="col-md-6">
                                    <input name="KK" type="file" class="upload" />
                                </div>
                        </div>
                        <input name="type" type="hidden" value="user" />
                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i>Create
                                </button>
                            </div>
                        </div>
                    </form>
                        <!-- </div>

                        </div> -->
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
    <!-- jQuery -->
    <script src="/assets/plugins/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/assets/plugins/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="/assets/plugins/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="/assets/js/sb-admin-2.js"></script>

</body>

</html>

@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Register</div>
                <div class="panel-body">
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/register') }}">
                        {!! csrf_field() !!}

                        <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                            <label class="col-md-4 control-label">Name</label>

                            <div class="col-md-6">
                                <input type="text" class="form-control" name="name" value="{{ old('name') }}">

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
                                <input type="email" class="form-control" name="email" value="{{ old('email') }}">

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
                                <input type="password" class="form-control" name="password">

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
                                <input type="password" class="form-control" name="password_confirmation">

                                @if ($errors->has('password_confirmation'))
                                    <span class="help-block">
                                        <strong>{{ $errors->first('password_confirmation') }}</strong>
                                    </span>
                                @endif
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
                                        <option>HR</option>
                                        <option>Supervisor</option>
                                        <option>Finance</option>
                                        <option>Employee</option>
                                    </select>
                                </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Birth Place</label>
                                <div class="col-md-6">
                                    <input class="form-control" name = "birth_place" type = "text">
                                </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Birth Date</label>
                                <div class="col-md-6">
                                    <input class="form-control" name = "birth_date" type ="date">
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
                                    <input class="form-control" name = "religion" type = "text">
                                </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">KTP Number</label>
                                <div class="col-md-6">
                                    <input class="form-control" name = "ktp_id" type = "text">
                                </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">NPWP Number</label>
                                <div class="col-md-6">
                                    <input class="form-control" name = "NPWP" type = "text">
                                </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">KTP Address</label>
                                <div class="col-md-6">
                                    <input class="form-control" name = "ktp_address" type = "text">
                                </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Phone</label>
                                <div class="col-md-6">
                                    <input class="form-control" name = "phone" type = "text">
                                </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Current Address</label>
                                <div class="col-md-6">
                                    <input class="form-control" name = "address" type = "text">
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

                        <div class="form-group">
                            <label class="col-md-4 control-label">Photo</label>
                                <div class="col-md-6">
                                    <input name="photo" type="file" class="upload" />
                                </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    <i class="fa fa-btn fa-user"></i>Register
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection

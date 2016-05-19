@extends('layoutTemplate')
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
                        <form class="form-horizontal" role="form" enctype="multipart/form-data" method="POST" action="{{ route('user.create') }}">
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
                                        @foreach ($departments as $department)
                                            @if ($department->name != 'Admin')
                                                @if ($department->id == old('departments_id'))
                                                <option value = "{{ $department->id }}" selected>{{ $department->name }}</option>
                                                @else
                                                    <option value = "{{ $department->id }}">{{ $department->name }}</option>
                                                @endif
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Division</label>
                                <div class="col-md-6">
                                    <select class="form-control" name = "divisions_id">
                                        @foreach ($divisions as $division)
                                            @if ($division->name != 'Admin')
                                                @if ($division->id == old('divisions_id'))
                                                    <option value = "{{ $division->id }}" selected>{{ $division->name }}</option>
                                                @else
                                                    <option value = "{{ $division->id }}">{{ $division->name }}</option>
                                                @endif
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">User Type</label>
                                <div class="col-md-6">
                                    <select class="form-control" name = "type">
                                        @if (old('type') == 'HR')
                                            <option value='HR' selected>HR</option>
                                            <option value='Supervisor'>Supervisor</option>
                                            <option value='Finance'>Finance</option>
                                            <option value='Employee'>Employee</option>
                                        @elseif (old('type') == 'Supervisor')
                                            <option value='HR'>HR</option>
                                            <option value='Supervisor' selected>Supervisor</option>
                                            <option value='Finance'>Finance</option>
                                            <option value='Employee'>Employee</option>
                                        @elseif (old('type') == 'Finance')
                                            <option value='HR'>HR</option>
                                            <option value='Supervisor'>Supervisor</option>
                                            <option value='Finance' selected>Finance</option>
                                            <option value='Employee'>Employee</option>
                                        @elseif (old('type') == 'Employee')
                                            <option value='HR'>HR</option>
                                            <option value='Supervisor'>Supervisor</option>
                                            <option value='Finance'>Finance</option>
                                            <option value='Employee' selected>Employee</option>
                                        @else
                                            <option value='HR'>HR</option>
                                            <option value='Supervisor'>Supervisor</option>
                                            <option value='Finance'>Finance</option>
                                            <option value='Employee'>Employee</option>
                                        @endif
                                    </select>
                                </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Supervisor</label>
                                <div class="col-md-6">
                                    <select class="form-control" name = "supervisor">
                                        @foreach ($supervisors as $supervisor)
                                            @if ($supervisor->id == old('supervisor'))
                                                <option value = "{{ $supervisor->id }}" selected>{{ $supervisor->name }}</option>
                                            @else
                                                <option value = "{{ $supervisor->id }}">{{ $supervisor->name }}</option>
                                            @endif
                                        @endforeach
                                    </select>
                                </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Birth Place</label>
                                <div class="col-md-6">
                                    <input class="form-control" name = "birth_place" type = "text" value = "{{ old('birth_place') }}" required>
                                </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Birth Date</label>
                                <div class="col-md-6">
                                    <input class="form-control" name = "birth_date" type ="date" value = "{{ old('birth_date') }}" required>
                                </div>
                        </div>

                       <div class="form-group">
                            <label class="col-md-4 control-label">Gender</label>
                             <div class="col-md-6">
                                <select class="form-control" name = "gender">
                                    @if (old('gender') == 'Male')
                                        <option value="Male" selected>Male</option>
                                        <option value="Female">Female</option>
                                    @elseif (old('gender') == 'Female')
                                        <option value="Male">Male</option>
                                        <option value="Female" selected>Female</option>
                                    @else
                                        <option value="Male">Male</option>
                                        <option value="Female">Female</option>
                                    @endif
                                </select>
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Religion</label>
                                <div class="col-md-6">
                                    <select class="form-control" name = "religion">
                                    @if (old('religion') == 'Islam')
                                        <option value="Islam" selected>Islam</option>
                                        <option value="Katolik">Katolik</option>
                                        <option value="Kristen">Kristen</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Buddha">Buddha</option>
                                        <option value="Lainnya">Lainnya</option>
                                    @elseif (old('religion') == 'Katolik')
                                        <option value="Islam">Islam</option>
                                        <option value="Katolik" selected>Katolik</option>
                                        <option value="Kristen">Kristen</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Buddha">Buddha</option>
                                        <option value="Lainnya">Lainnya</option>
                                    @elseif (old('religion') == 'Kristen')
                                        <option value="Islam">Islam</option>
                                        <option value="Katolik">Katolik</option>
                                        <option value="Kristen" selected>Kristen</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Buddha">Buddha</option>
                                        <option value="Lainnya">Lainnya</option>
                                    @elseif (old('religion') == 'Hindu')
                                        <option value="Islam">Islam</option>
                                        <option value="Katolik">Katolik</option>
                                        <option value="Kristen">Kristen</option>
                                        <option value="Hindu" selected>Hindu</option>
                                        <option value="Buddha">Buddha</option>
                                        <option value="Lainnya">Lainnya</option>
                                    @elseif (old('religion') == 'Buddha')
                                        <option value="Islam">Islam</option>
                                        <option value="Katolik">Katolik</option>
                                        <option value="Kristen">Kristen</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Buddha" selected>Buddha</option>
                                        <option value="Lainnya">Lainnya</option>
                                    @elseif (old('religion') == 'Lainnya')
                                        <option value="Islam">Islam</option>
                                        <option value="Katolik">Katolik</option>
                                        <option value="Kristen">Kristen</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Buddha">Buddha</option>
                                        <option value="Lainnya" selected>Lainnya</option>
                                    @else
                                        <option value="Islam">Islam</option>
                                        <option value="Katolik">Katolik</option>
                                        <option value="Kristen">Kristen</option>
                                        <option value="Hindu">Hindu</option>
                                        <option value="Buddha">Buddha</option>
                                        <option value="Lainnya">Lainnya</option>
                                    @endif
                                </select>
                                </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">KTP Number</label>
                                <div class="col-md-6">
                                    <input class="form-control" name = "ktp_id" type = "text" value = "{{ old('ktp_id') }}" required>
                                </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">NPWP Number</label>
                                <div class="col-md-6">
                                    <input class="form-control" name = "NPWP" type = "text" value = "{{ old('NPWP') }}" required>
                                </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">KTP Address</label>
                                <div class="col-md-6">
                                    <input class="form-control" name = "ktp_address" type = "text" value = "{{ old('ktp_address') }}" required>
                                </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Phone</label>
                                <div class="col-md-6">
                                    <input class="form-control" name = "phone" type = "text" value = "{{ old('phone') }}" required>
                                </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Current Address</label>
                                <div class="col-md-6">
                                    <input class="form-control" name = "address" type = "text" value = "{{ old('address') }}" required>
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

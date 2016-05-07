@extends('layoutTemplate')
@section('content')

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">RESET USER</h1>
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
                                <div class="col-lg-6" style= "width:500px">
                                    <div class="col-image">
                                        <span>
                                            <img alt="image" class="" width= 100% src="upload/photos/{{ $user->photo }}">
                                        </span>
                                        <br><br>
                                        <form role = "form" method="post" action="/reset:{{ $user->id }}">
                                            <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                            <input name = "user_id" type = "hidden" value = "{{ $user->id }}">
                                            <select class="form-control" name = "status" style="width: 100%";>
                                                @if ($user->status == "Active")
                                                    <option selected>Active</option>
                                                    <option>Inactive</option>
                                                @else
                                                    <option>Active</option>
                                                    <option selected>Inactive</option>
                                                @endif
                                            </select>
                                            <br>
                                            <button type="submit" class="btn btn-default">Switch Status</button>
                                        </form>
                                    </div>
                                </div>

                            <div class="col-lg-6">
                                <form role="form" method="post" action="/reset:{{ $user->id }}">
                                    <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                    <input name = "user_id" type = "hidden" value = "{{ $user->id }}">
                                    <div class="form-group">
                                        <label>Division</label>
                                        <select class="form-control" name = "division">
                                            @foreach ($divisions as $division)
                                                @if ($division->id == $user->divisions_id)
                                                    <option value = "{{ $division->id }}" selected>{{ $division->name }}</option>
                                                @else
                                                    <option value = "{{ $division->id }}">{{ $division->name }}</option>
                                                @endif
                                            @endforeach
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Role</label>
                                        <select class="form-control" name = "role">
                                            @if ($user->type == 'HR')
                                                <option>Finance</option>
                                                <option selected>HR</option>
                                                <option>Supervisor</option>
                                                <option>Employee</option>
                                            @elseif ($user->type == 'Supervisor')
                                                <option>Finance</option>
                                                <option>HR</option>
                                                <option selected>Supervisor</option>
                                                <option>Employee</option>
                                            @elseif ($user->type == 'Finance')
                                                <option selected>Finance</option>
                                                <option>HR</option>
                                                <option>Supervisor</option>
                                                <option>Employee</option>
                                            @elseif ($user->type == 'Employee')
                                                <option>Finance</option>
                                                <option>HR</option>
                                                <option>Supervisor</option>
                                                <option selected>Employee</option>
                                            @endif
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>New Password</label>
                                        <input class="form-control" name = "newPassword" type = "password">
                                    </div>
                                    <div class="form-group">
                                        <label>Repeat Password</label>
                                        <input class="form-control" name = "repeatPassword" type = "password">
                                    </div>

                                    <br>
                                    <button type="submit" class="btn btn-default">Save</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
    </div>
    <!-- /#wrapper -->
    @endsection
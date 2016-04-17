@extends('layoutTemplate')
<!DOCTYPE html>
<html lang="en">

<head>

</head>

<body>
	@section('content')

<div id="page-wrapper">
            <div class="row">
                <div class="col-lg-12">
                    <h1 class="page-header">EDIT PROFILE</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                    <div class="panel-heading">
                    </div>
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6" style= "width:50%">
                                <form role="form" method = "post" action = "/uploadImage">
                                    <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                    <div class="col-image">
                                    <span>
                                         <img alt="image" class="img-responsive img-circle" src="assets/photo.png">
                                     </span>          
                                    <input style="margin-top:3%" onclick="myFunction()" type="file" class="upload" />
                                    <script>
                                            function myFunction() {
                                                var x = document.getElementById("myFile");
                                                x.disabled = true;
                                            }
                                    </script>
                                </form>
                                </div>
                                </div>
        
                <div class="col-lg-6">
                            <form role="form" method = "post" action = "/updateProfile">
                                    <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input class="form-control" name = "password" type = "password">
                                    </div>
                                    <!--belom selesai ya-->
                                    @if (Auth::user()->type == "HR")
                                        <div class="form-group">
                                            <label>Division</label>
                                            <select class="form-control" name = "role">
                                                <?php
                                                foreach ($divisions as $division) {
                                                    echo '<option value="'.$division->id.'">'.$division->name.'</option>';
                                                }?>
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
                                    @endif
                                    <div class="form-group">
                                        <label>Full Name</label>
                                        <input class="form-control" name = "fullname" type = "text" value = "{{ $user->name }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Birth Place</label>
                                        <input class="form-control" name = "birthplace" type = "text" value = "{{ $user->birth_place }}"required>
                                    </div>
                                    <div class="form-group">
                                        <label>Birth Date</label>
                                        <input class="form-control" name = "birthdate" type = "date" value = "{{ $user->birth_date }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <select class="form-control" name = "gender">
                                            @if ($user->gender == 'Male')
                                                <option>Male</option>
                                            @else
                                                <option>Female</option>
                                            @endif
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Religion</label>
                                        <input class="form-control" name = "religion" type = "text" value = "{{ $user->religion }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label>KTP Number</label>
                                        <input class="form-control" name = "ktpnumber" type = "text" value = "{{ $user->ktp_id }}" required>
                                    </div>
                                    <div class="form-group">
                                        <label>NPWP Number</label>
                                        <input class="form-control" name = "npwpnumber" type = "text" value = "{{ $user->NPWP }}" required>
                                    </div>

                                    <div class="form-group">
                                        <label>KTP Address</label>
                                        <textarea class ="form-control" name = "ktpAddress" required>{{ $user->ktp_address }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Current Address</label>
                                        <textarea class ="form-control" name = "currentAddress" required>{{ $user->address }}</textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Telephone Number</label>
                                        <input class="form-control" name = "tlpnumber" type = "text" value = "{{ $user->phone }}" required>
                                    </div>
                                    <label>Curriculum Vitae</label>
                                        <input onclick="myFunction()" type="file" class="upload" />
                                        <script>
                                        function myFunction() {
                                            var x = document.getElementById("myFile");
                                            x.disabled = true;
                                        }
                                        </script>
                                    <br>
                                    <label>KTP</label>
                                        <input onclick="myFunction()" type="file" class="upload" />

                                        <script>
                                        function myFunction() {
                                            var x = document.getElementById("myFile");
                                            x.disabled = true;
                                        }
                                        </script>
                                    <br>
                                    <label>Ijazah</label>
                                        <input onclick="myFunction()" type="file" class="upload" />

                                        <script>
                                        function myFunction() {
                                            var x = document.getElementById("myFile");
                                            x.disabled = true;
                                        }
                                        </script>
                                    <br>
                                    <label>Kartu Keluarga</label>
                                        <input onclick="myFunction()" type="file" class="upload" />

                                        <script>
                                        function myFunction() {
                                            var x = document.getElementById("myFile");
                                            x.disabled = true;
                                        }
                                        </script>
                                    <br>
                                    <button type="submit" class="btn btn-default">Save</button>   
                            </form>
                </div>
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

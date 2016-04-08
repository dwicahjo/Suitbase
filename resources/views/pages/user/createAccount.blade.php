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
                <h1 class="page-header">Create Account</h1>
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
                            <div class="col-lg-6">
                                <form role="form">
                                    <div class="form-group">
                                        <label>Email</label>
                                        <input class="form-control" name = "email" type = "email" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Password</label>
                                        <input class="form-control" name = "password" type = "password" required>
                                    </div>
                                    <!--belom selesai ya-->
                                    <div class="form-group">
                                        <label>Division</label>
                                        <select class="form-control" name = "role">
                                            <option>Creative</option>
                                            <option>IT</option>
                                            <option>HR</option>
                                            <option>??</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label>Role</label>
                                        <select class="form-control" name = "role">
                                            <option>Finance</option>
                                            <option>HR</option>
                                            <option>SUpervisor</option>
                                            <option>Employee</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Full Name</label>
                                        <input class="form-control" name = "fullname" type = "text" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Birth Place</label>
                                        <input class="form-control" name = "birthplace" type = "text" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Birth Date</label>
                                        <input class="form-control" name = "startdate" type = "date">
                                    </div>
                                    <div class="form-group">
                                        <label>Gender</label>
                                        <select class="form-control" name = "gender">
                                            <option>Male</option>
                                            <option>Female</option>
                                        </select>
                                    </div>
                                    <div class="form-group">
                                        <label>Religion</label>
                                        <input class="form-control" name = "religion" type = "text" required>
                                    </div>

                                    <div class="form-group">
                                        <label>KTP Number</label>
                                        <input class="form-control" name = "ktpnumber" type = "text" required>
                                    </div>
                                    <div class="form-group">
                                        <label>NPWP Number</label>
                                        <input class="form-control" name = "npwpnumber" type = "text" required>
                                    </div>

                                    <div class="form-group">
                                        <label>KTP Address</label>
                                        <textarea class ="form-control" name = "ktpAddress" required> </textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Current Address</label>
                                        <textarea class ="form-control" name = "currentAddress" required> </textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Telephone Number</label>
                                        <input class="form-control" name = "tlpnumber" type = "text" required>
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
                                    <button type="submit" class="btn btn-default">Create</button>   
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

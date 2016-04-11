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
                    <h1 class="page-header">RESET USER</h1>
                </div>
                <!-- /.col-lg-12 -->
            </div>
            <!-- /.row -->
            <div class="row">
                <div class="col-lg-12">
                    <div class="panel panel-default">
                        <div class="panel-body">
                            <div class="row">
                                <div class="col-lg-6" style= "width:500px">
                                    <div class="col-image">
                                    <span>
                                         <img alt="image" class="" width= 60% src="assets/foto.jpg">
                                     </span>
                                     <br><br>
                                        <select class="form-control" name = "role" style="width: 214px";>
                                            <option>Active</option>
                                             <option>Deactive</option>
                                        </select>
                                    </div>
                                </div>

                                <div class="col-lg-6">
                                            <form role="form">
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

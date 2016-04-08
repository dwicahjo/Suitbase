@extends('layoutTemplate') <!DOCTYPE html>
<html lang="en">
<head></head>
<body>
 @section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">My Profile</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6">
                            <div class="row">
                                <div class="col-lg-2"></div>
                                <div class="col-lg-8">
                                    <img alt="image" class="img-responsive" src="assets/foto.jpg">
                                </div>
                            </div> <!--row-->
                        </div> <!--col-lg-6-->
                    
                        <div class="col-lg-6">
                            <div class="form-group">
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Email</label>
                                        <div class="col-md-4">{{ Auth::user()->email }}</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Role</label>
                                        <div class="col-md-6">{{ Auth::user()->divisions_id}}</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Full Name</label>
                                        <div class="col-md-6">{{ Auth::user()->name }}</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Birth Place</label>
                                        <div class="col-md-6">{{ Auth::user()->birth_place }}</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Birth Date</label>
                                        <div class="col-md-6">{{ Auth::user()->birth_date }}</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Gender</label>
                                        <div class="col-md-6">{{ Auth::user()->gender }}</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Religion</label>
                                        <div class="col-md-6">{{ Auth::user()->religion }}</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">KTP Number</label>
                                        <div class="col-md-6">{{ Auth::user()->ktp_id }}</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">NPWP Number</label>
                                        <div class="col-md-6">{{ Auth::user()->NPWP }}</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">KTP Address</label>
                                        <div class="col-md-6">{{ Auth::user()->address }}</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Current Address</label>
                                        <div class="col-md-6">{{ Auth::user()->address }}</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <label class="col-md-4 control-label">Phone Number</label>
                                        <div class="col-md-6">{{ Auth::user()->phone }}</div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <a href="editProfile" class="btn btn-default" role="button">Change Profile</a>
                                        </div>
                                    </div>
                                </div>
                            </div> <!--form group-->
                        </div> <!--col-lg-6-->
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
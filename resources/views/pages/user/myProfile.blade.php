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
                <div class="panel-heading">
                    </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-5">
                            <div class="row">
                                <div class="col-lg-12">
                                    <img alt="image" class="img-responsive" src="assets/foto.jpg">
                               </div>
                            </div> <!--row-->
                        </div> <!--col-lg-6-->

                        <div class="col-lg-7">
                            <div class="panel-body">
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>Email</td>
                                            <td>{{ Auth::user()->email }}</td>
                                        </tr>
                                        <tr>
                                            <td>Role</td>
                                            <td>{{ Auth::user()->divisions_id}}</td>
                                        </tr>
                                        <tr>
                                            <td>Full Name</td>
                                            <td>{{ Auth::user()->name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Birth Place</td>
                                            <td>{{ Auth::user()->birth_place }}</td>
                                        </tr>
                                        <tr>
                                            <td>Birth Date</td>
                                            <td>{{ Auth::user()->birth_date }}</td>
                                        </tr>
                                        <tr>
                                            <td>Gender</td>
                                            <td>{{ Auth::user()->gender }}</td>
                                        </tr>
                                        <tr>
                                            <td>Religion</td>
                                            <td>{{ Auth::user()->religion }}</td>
                                        </tr>
                                        <tr>
                                            <td>KTP Number</td>
                                            <td>{{ Auth::user()->ktp_id }}</td>
                                        </tr>
                                        <tr>                                    
                                            <td>NPWP Number</td>
                                            <td>{{ Auth::user()->NPWP }}</td>
                                        </tr>
                                        <tr>
                                            <td>KTP Address</td>
                                            <td>{{ Auth::user()->address }}</td>
                                        </tr>
                                        <tr>
                                            <td>Current Address</td>
                                            <td>{{ Auth::user()->address }}</td>
                                        </tr>
                                        <tr>
                                            <td>Phone Number</td>
                                            <td>{{ Auth::user()->phone }}</td>
                                        </tr>
                                <!-- msh bingung ada atau ngga -->
                                        <tr>
                                        <td>Curriculum Vitae</td>
                                        <td><a href="{{Auth::user()->CV }}">CV</a></td>
                                        </tr>
                                        <tr>
                                        <td>KTP Number</td>
                                        <td>{{ Auth::user()->ktp_id }}</td>
                                        </tr>
                                        <tr>
                                        <td>Ijazah</td>
                                        <td><a href="{{Auth::user()->ijazah }}">Ijazah</a></td>
                                        </tr>
                                        <tr>
                                        <td>Kartu Keluarga</td>
                                        <td><a href="{{ Auth::user()->KK }}">KK</a></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                     </tbody>
                                </table>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <a href="editProfile" class="btn btn-default" role="button">Edit Profile</a>
                                        </div>
                                    </div>
                                </div>
                            </div> <!--form group-->
                            
                                        
                                     
                                   
                            </div>
                            <!-- /.table-responsive -->
                        </div>
                        <!-- /.panel-body -->
                        </div> <!--col-lg-7-->
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
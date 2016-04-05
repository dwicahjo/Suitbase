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
                                <div class="col-lg-6" style= "width:500px">
                                    <div class="col-image">
                                    <span>
                                         <img alt="image" class="" width= 60% src="assets/foto.jpg">
                                     </span>
                                     <br><br>
                                       <a href="editProfile" class="btn btn-default" role="button">Change Profile</a>  
                                    </div>
                                </div>
                
                <div class="col-lg-6">
                            <form role="form">
                                <table class="table-view" id="dataTables-example">
                                    <div class="form-group">
                                        <tr>
                                        <td><label>Email</label></td>
                                        <td>annisachibi@suitmedia.com </td>
                                        </tr>
                                    </div>
                                    <div class="form-group">
                                        <tr>
                                        <td><label>Diviison</label></td>
                                        <td>IT</td>
                                        </tr>                                    
                                    </div>
                                    <div class="form-group">
                                        <tr>
                                        <td><label>Role</label></td>
                                        <td>employee</td>
                                        </tr>                                    
                                    </div>
                                    <div class="form-group">
                                        <tr>
                                        <td><label>Full Name</label></td>
                                        <td>Annisa Chibi </td>
                                        </tr>
                                    </div>
                                    <div class="form-group">
                                        <tr>
                                        <td><label>Birth Place</label></td>
                                        <td>London</td>
                                        </tr>
                                    </div>
                                    <div class="form-group">
                                        <tr>
                                        <td><label>Birth Date</label></td>
                                        <td>20 Maret 1995 </td>
                                        </tr>
                                    </div>
                                    <div class="form-group">
                                        <tr>
                                        <td><label>Gender</label></td>
                                        <td>Female</td>
                                        </tr>
                                    </div>
                                    <div class="form-group">
                                        <tr>
                                        <td><label>Religion</label></td>
                                        <td>Islam</td>
                                        </tr>
                                    </div>
                                    <div class="form-group">
                                        <tr>
                                        <td><label>KTP Number</label></td>
                                        <td>123456789</td>
                                        </tr>
                                    </div>
                                    <div class="form-group">
                                        <tr>
                                        <td><label>NPWP Number</label></td>
                                        <td>987654321 </td>
                                        </tr>
                                    </div>
                                    <div class="form-group">
                                        <tr>
                                        <td><label>KTP Address:</label></td>
                                        <td>Jl. Pejaten Barat II No.3A, RT.2/RW.8, Pejaten Bar., Ps. Minggu, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta </td>
                                        </tr>
                                    </div>
                                    <div class="form-group">
                                        <tr>
                                        <td><label>Current Address:</label></td>
                                        <td>Jl. Pejaten Barat II No.3A, RT.2/RW.8, Pejaten Bar., Ps. Minggu, Kota Jakarta Selatan, Daerah Khusus Ibukota Jakarta </td>
                                        </tr>
                                    </div>
                                    <div class="form-group">
                                        <tr>
                                        <td><label>Telephone Number:</label></td>
                                        <td>(021) 7196877</td>
                                        </tr>
                                    </div>
                            </table>
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

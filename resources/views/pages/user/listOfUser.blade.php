@extends('layoutTemplate')
{{-- <!DOCTYPE html>
<html lang="en">

<head>
</head>

<body> --}}
    @section('content')

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">LIST OF USER</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                    </div>

                    <div class="row">
                            <div class="col-lg-7 upper-menu-left">
                                <div class="row">
                                        <div class="col-lg-6">
                                          <label>Choose Division:</label>
                                            <select class="form-control" name = "leavetype">
                                                <option>PR</option>
                                                <option>Creative</option>
                                                <option>IT</option>
                                                <option>HR</option>
                                            </select>
                                        </div>
                 
                                    </div> <!--row-->
                            </div>
                            <div class="col-lg-5">
                                <div class="upper-menu">
                                    <div class="upper-menu-right">
                                        <a href="createAccount">
                                            <i class="fa fa-plus fa-fw"></i>
                                            <label>
                                                Add Account
                                            </label>
                                        </a>
                                    </div>
                                </div>
                            </div>
                        </div>

                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>No. </th>
                                        <th>Division </th>
                                        <th>Name </th>
                                        <th> </th>

                                    </tr>
                                </thead>
                                <tbody>
                                   <?php $i=1; ?>
                                    @foreach($users as $user)
                                    <tr class="odd gradeA">
                                        <td>{{$i}}</td>
                                        <td>{{$user->division}}</td>
                                        <td><a href="/userDetails:{{$user->id}}">{{$user->name}}</a></td>
                                        <th><a href="/editProfile" class="btn btn-default btn-edit" role="button">Edit</a>
                                            <a href="/resetUser" class="btn btn-default btn-delete" role="button">Reset</a></th>
                                    </tr>
                                    <?php $i++; ?>
                                    @endforeach

                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->

        </div>
        <!-- /#page-wrapper -->
        @endsection

{{--     <!-- jQuery -->
    <script src="assets/plugins/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="assets/plugins/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="assets/plugins/metisMenu/dist/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="assets/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="assets/plugins/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="assets/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference -->
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
    </script>

</body>

</html>
 --}}

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
                <h1 class="page-header">List Of Appraisals</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                    </div>
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-8">
                                <div class="row">
                                    <div class="dataTable_wrapper">
                                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                            <thead>
                                                <tr>
                                                    <th style="text-align: center">No</th>>
                                                    <th style="text-align: center">Date_Start</th>
                                                    <th style="text-align: center">Date_end</th>
                                                    <th style="text-align: center">Employee Name</th>
                                                    <th style="text-align: center">Division</th>
                                                </tr>
                                            </thead>
                                            <tbody style="text-align: center">
                                                <?php $i=1; ?>
                                                @foreach ($appraisals as $appraisal)
                                                <tr class="odd gradeA">
                                                    <td>{{$i}}</td>
                                                    <td>{{$appraisal->appraisalsTemplate->date_start}}</td>
                                                    <td>{{$appraisal->appraisalsTemplate->date_end}}</td>
                                                    <td><a href="/fillAppraisal:{{$appraisal->id}}">{{$appraisal->employee->name}}</a></td>
                                                    <td>{{$appraisal->division->name}}</td>
                                                </tr>
                                                <?php $i++; ?>
                                                @endforeach
                                            </tbody>
                                        </table>

                                    </div>
                                </div>
                            </div> <!--row-->

                            <div class="col-lg-4">
                                <div class="menu-appraisal">
                                    <label>Choose Division:</label>
                                    <select class="form-control" name = "leavetype">
                                        <option>PR</option>
                                        <option>Creative</option>
                                        <option>IT</option>
                                        <option>HR</option>
                                    </select>
                                </div>

                                <div class="menu-appraisal">
                                    <label>Choose Period:</label>
                                    <select class="form-control" name = "leavetype">
                                        <option>2015</option>
                                        <option>2014</option>
                                        <option>2013</option>
                                        <option>2012</option>
                                    </select>
                                </div>

                                <div class="menu-appraisal">
                                    <button type="submit" class="btn btn-default">View Recap</button>
                                </div>

                                <div class="menu-appraisal">
                                    <a href="createAppraisal">
                                        <i class="fa fa-pencil-square-o fa-fw"></i>
                                        <label>
                                            Create Appraisal
                                        </label>
                                    </a>
                                </div>

                            </div>
                        </div>
                        <!-- /.table-responsive -->
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

        <!-- jQuery -->
        <script src="/assets/plugins/jquery/dist/jquery.min.js"></script>

        <!-- Bootstrap Core JavaScript -->
        <script src="/assets/plugins/bootstrap/dist/js/bootstrap.min.js"></script>

        <!-- Metis Menu Plugin JavaScript -->
        <script src="/assets/plugins/metisMenu/dist/metisMenu.min.js"></script>

        <!-- DataTables JavaScript -->
        <script src="/assets/plugins/datatables/media/js/jquery.dataTables.min.js"></script>
        <script src="/assets/plugins/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

        <!-- Custom Theme JavaScript -->
        <script src="/assets/js/sb-admin-2.js"></script>

    <!-- Page-Level Demo Scripts - Tables - Use for reference
    <script>
    $(document).ready(function() {
        $('#dataTables-example').DataTable({
                responsive: true
        });
    });
</script>-->

</body>

</html>

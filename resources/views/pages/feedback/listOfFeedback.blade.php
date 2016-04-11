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
                <h1 class="page-header">List of Feedback</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
<<<<<<< HEAD
=======
                    <div class="row">
>>>>>>> 2c597105d518500ff6ce263e6dcf3c8fe7732c1a
                    <!--<div class="panel-heading">
                        DataTables Advanced Tables
                    </div>-->
                    <!-- /.panel-heading -->
<<<<<<< HEAD
<<<<<<< HEAD

=======
                    <div class="col-lg-5">
                    </div>
                    <div class="col-lg-7">
>>>>>>> 2c597105d518500ff6ce263e6dcf3c8fe7732c1a
=======
                    <div class="col-lg-12">
>>>>>>> 315374fbeca3037a61b981f8166a7cacbe3801bc
                    <div class = "search_menu">
                        <div class="input-group">
                            <input type="text" class="form-control" placeholder="Search for...">
                            <span class="input-group-btn">
                            <button class="btn btn-default" type="button">Go!</button>
                            </span>
                        </div><!-- /input-group -->
                    </div>
<<<<<<< HEAD
=======
                    </div>
                    </div>
>>>>>>> 2c597105d518500ff6ce263e6dcf3c8fe7732c1a

                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>No. </th>
<<<<<<< HEAD
                                        <th>Timestamp</th>
                                        <th>Name </th>
                                        <th>Division</th>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                   <a href="detailFeedback">
                                    <tr class="odd gradeX">
                                        <td>1</td>
                                        <td><a href="detailFeedback">Internet Explorer 4.0</a></td>
                                        <td>Win 95+</td>
                                        <td>Win 95+</td>
                                    </tr>
                            
                                    <tr class="even gradeC">
                                        <td>2</td>
                                        <td>Internet Explorer 5.0</td>
                                        <td>Win 95+</td>
                                        <td>Win 95+</td>                                   
                                    </tr>
                                    <tr class="odd gradeA">
                                        <td>3</td>
                                        <td>Internet Explorer 5.5</td>
                                        <td>Win 95+</td>
                                        <<td>Win 95+</td>
                                    </tr>
                                    <tr class="even gradeA">
                                        <td>4</td>
                                        <td>Internet Explorer 6</td>
                                        <td>Win 98+</td>
                                        <td>Win 95+</td>
                                    </tr>
                                    <tr class="odd gradeA">
                                        <td>5</td>
                                        <td>Internet Explorer 7</td>
                                        <td>Win XP SP2+</td>
                                        <td>Win 95+</td>
                                    </tr>
                                    <tr class="even gradeA">
                                        <td>6</td>
                                        <td>AOL browser (AOL desktop)</td>
                                        <td>Win XP</td>
                                        <td>Win XP</td>
                                    </tr>
                                    
=======
                                        <th>Description</th>
                                        <th>Timestamp </th>
                                        <th>Division</th>

                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; ?>
                                    @foreach ($feedbacks as $feedback)
                                    <tr class="odd gradeA">
                                        <td>{{$i}}</td>
                                        <td><a href="/detailFeedback:{{$feedback->id}}">{{str_limit($feedback->description, $limit = 20, $end = '...')}}</a></td>
                                        <td>{{$feedback->created_at}}</td>
                                        <td>{{$feedback->employees_id}}</td>
                                    </tr>
                                    <?php $i++; ?>
                                    @endforeach
>>>>>>> 2c597105d518500ff6ce263e6dcf3c8fe7732c1a
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
<<<<<<< HEAD
      
=======

>>>>>>> 2c597105d518500ff6ce263e6dcf3c8fe7732c1a
        </div>
        <!-- /#page-wrapper -->
        @endsection

    <!-- jQuery -->
    <script src="../bower_components/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="../bower_components/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="../bower_components/metisMenu/dist/metisMenu.min.js"></script>

    <!-- DataTables JavaScript -->
    <script src="../bower_components/datatables/media/js/jquery.dataTables.min.js"></script>
    <script src="../bower_components/datatables-plugins/integration/bootstrap/3/dataTables.bootstrap.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="../dist/js/sb-admin-2.js"></script>

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

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
                <h1 class="page-header">My Training Requests</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <!--<div class="panel-heading">
                        DataTables Advanced Tables
                    </div>-->
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>No. </th>
                                        <th>Training Title</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="odd gradeX">
<<<<<<< HEAD:resources/views/pages/training/myListofTraining.blade.php
<<<<<<< HEAD
                                        <td>1</td>
                                        <td>Internet Explorer 4.0</td>
                                        <td>Win 95+</td>
                                        <td class="center">4</td>
                                        <td class="center">X</td>
                                        <th><form method = "link" action="editleave"><button>Edit</button></form> <button>Cancel</button></th>
                                        
=======
                                        <td class="center">1</td>
                                        <td class="center">Internet Explorer 4.0</td>
                                        <td class="center">Win 95+</td>
                                        <th><a href="editTraining" class="btn btn-default" role="button">Edit</a>
                                            <a href="resetUser" class="btn btn-default" role="button">Cancel</a></th>
>>>>>>> 2c597105d518500ff6ce263e6dcf3c8fe7732c1a
=======
                                        <td> 1</td>
                                        <td><a href="trainingDetails"> Cisco training</a></td>
                                        <td> Submitted</td>
                                        <th><a href="editTraining" class="btn btn-default" role="button">Edit</a>
                                            <a href="#" class="btn btn-default" role="button">Cancel</a></th>
>>>>>>> 315374fbeca3037a61b981f8166a7cacbe3801bc:resources/views/pages/training/myTraining.blade.php
                                    </tr>
                                    <tr class="even gradeC">
                                        <td>2</td>
                                        <td>Internet Explorer 5.0</td>
<<<<<<< HEAD:resources/views/pages/training/myListofTraining.blade.php
<<<<<<< HEAD
                                        <td>Win 95+</td>
                                        <td class="center">5</td>
                                        <td class="center">C</td>
                                        <th><button>Edit</button> <button>Cancel</button></th>
=======
                                        <td>Win 95+</td><th><a href="editOvertime" class="btn btn-default" role="button">Edit</a>
=======
                                        <td>Win 95+</td>
                                        <th><a href="editOvertime" class="btn btn-default" role="button">Edit</a>
>>>>>>> 315374fbeca3037a61b981f8166a7cacbe3801bc:resources/views/pages/training/myTraining.blade.php
                                            <a href="resetUser" class="btn btn-default" role="button">Cancel</a></th>
>>>>>>> 2c597105d518500ff6ce263e6dcf3c8fe7732c1a
                                    </tr>
                                    <tr class="odd gradeA">
                                        <td>3</td>
                                        <td>Internet Explorer 5.5</td>
                                        <td>Win 95+</td>
<<<<<<< HEAD
                                        <td class="center">5.5</td>
                                        <td class="center">A</td>
                                        <th><button>Edit</button> <button>Cancel</button></th>
=======
                                        <th><a href="editTraining" class="btn btn-default" role="button">Edit</a>
                                            <a href="resetUser" class="btn btn-default" role="button">Cancel</a></th>
>>>>>>> 2c597105d518500ff6ce263e6dcf3c8fe7732c1a
                                    </tr>
                                    <tr class="even gradeA">
                                        <td>4</td>
                                        <td>Internet Explorer 6</td>
                                        <td>Win 98+</td>
<<<<<<< HEAD
                                        <td class="center">6</td>
                                        <td class="center">A</td>
                                        <th><button>Edit</button> <button>Cancel</button></th>
=======
                                        <th><a href="editOvertime" class="btn btn-default" role="button">Edit</a>
                                            <a href="resetUser" class="btn btn-default" role="button">Cancel</a></th>
>>>>>>> 2c597105d518500ff6ce263e6dcf3c8fe7732c1a
                                    </tr>
                                    <tr class="odd gradeA">
                                        <td>5</td>
                                        <td>Internet Explorer 7</td>
                                        <td>Win XP SP2+</td>
<<<<<<< HEAD
                                        <td class="center">7</td>
                                        <td class="center">A</td>
                                        <th><button>Edit</button> <button>Cancel</button></th>
=======
                                        <th><a href="editOvertime" class="btn btn-default" role="button">Edit</a>
                                            <a href="resetUser" class="btn btn-default" role="button">Cancel</a></th>
>>>>>>> 2c597105d518500ff6ce263e6dcf3c8fe7732c1a
                                    </tr>
                                    <tr class="even gradeA">
                                        <td>6</td>
                                        <td>AOL browser (AOL desktop)</td>
                                        <td>Win XP</td>
<<<<<<< HEAD
                                        <td class="center">6</td>
                                        <td class="center">A</td>
                                        <th><button>Edit</button> <button>Cancel</button></th>
=======
                                        <th><a href="editOvertime" class="btn btn-default" role="button">Edit</a>
                                            <a href="resetUser" class="btn btn-default" role="button">Cancel</a></th>
>>>>>>> 2c597105d518500ff6ce263e6dcf3c8fe7732c1a
                                    </tr>
                                    <tr class="gradeA">
                                        <td>7</td>
                                        <td>Firefox 1.0</td>
                                        <td>Win 98+ / OSX.2+</td>
<<<<<<< HEAD
                                        <td class="center">1.7</td>
                                        <td class="center">A</td>
                                        <th><button>Edit</button> <button>Cancel</button></th>
=======
                                        <th><a href="editOvertime" class="btn btn-default" role="button">Edit</a>
                                            <a href="resetUser" class="btn btn-default" role="button">Cancel</a></th>
>>>>>>> 2c597105d518500ff6ce263e6dcf3c8fe7732c1a
                                    </tr>
                                    <tr class="gradeA">
                                        <td>8</td>
                                        <td>Firefox 1.5</td>
                                        <td>Win 98+ / OSX.2+</td>
<<<<<<< HEAD
                                        <td class="center">1.8</td>
                                        <td class="center">A</td>
                                        <th><button>Edit</button> <button>Cancel</button></th>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>9</td>
                                        <td>Firefox 2.0</td>
                                        <td>Win 98+ / OSX.2+</td>
                                        <td class="center">1.8</td>
                                        <td class="center">A</td>
                                        <th><button>Edit</button> <button>Cancel</button></th>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>10</td>
                                        <td>Firefox 3.0</td>
                                        <td>Win 2k+ / OSX.3+</td>
                                        <td class="center">1.9</td>
                                        <td class="center">A</td>
                                        <th><button>Edit</button> <button>Cancel</button></th>

                                    </tr>
                                    <tr class="gradeA">
                                        <td>11</td>
                                        <td>Camino 1.0</td>
                                        <td>OSX.2+</td>
                                        <td class="center">1.8</td>
                                        <td class="center">A</td>
                                        <th><button>Edit</button> <button>Cancel</button></th>
                                    </tr>
                                    
=======
                                        <th><a href="editOvertime" class="btn btn-default" role="button">Edit</a>
                                            <a href="resetUser" class="btn btn-default" role="button">Cancel</a></th>
                                    </tr>
>>>>>>> 2c597105d518500ff6ce263e6dcf3c8fe7732c1a
                                </tbody>
                            </table>
                        </div>
                        <!-- /.table-responsive -->
<<<<<<< HEAD
                        <div class="well">
                            <h4>DataTables Usage Information</h4>
                            <p>DataTables is a very flexible, advanced tables plugin for jQuery. In SB Admin, we are using a specialized version of DataTables built for Bootstrap 3. We have also customized the table headings to use Font Awesome icons in place of images. For complete documentation on DataTables, visit their website at <a target="_blank" href="https://datatables.net/">https://datatables.net/</a>.</p>
                            <a class="btn btn-default btn-lg btn-block" target="_blank" href="https://datatables.net/">View DataTables Documentation</a>
                        </div>
=======
>>>>>>> 2c597105d518500ff6ce263e6dcf3c8fe7732c1a
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

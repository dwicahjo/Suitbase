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
                <h1 class="page-header">Fill Appraisal</h1>
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
                    <div class = "header">
                    <label>Appraisee Name: </label> <label>Gati Yusrina</label></br>
                    <label>Division: </label> <label> HR</label>
                    </div>
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>No. </th>
                                        <th>Question </th>
                                        <th>5 </th>
                                        <th>4 </th>
                                        <th>3 </th>
                                        <th>2</th>
                                        <th>1</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr class="odd gradeX">
                                        <td>1</td>
                                        <td>Internet Explorer 4.0</td>
                                        <td><input type="radio" name="question1"  value="5" ></td>
                                        <td><input type="radio" name="question1"  value="4" ></td>
                                        <td><input type="radio" name="question1"  value="3" ></td>
                                        <td><input type="radio" name="question1"  value="2" ></td>
                                        <td><input type="radio" name="question1"  value="1" ></td>
                                    </tr>
                                    <tr class="even gradeC">
                                        <td>2</td>
                                        <td>Internet Explorer 5.0</td>
                                        <td><input type="radio" name="question2"  value="5" ></td>
                                        <td><input type="radio" name="question2"  value="4" ></td>
                                        <td><input type="radio" name="question2"  value="3" ></td>
                                        <td><input type="radio" name="question2"  value="2" ></td>
                                        <td><input type="radio" name="question2"  value="1" ></td>
                                    </tr>
                                    <tr class="odd gradeA">
                                        <td>3</td>
                                        <td>Internet Explorer 5.5</td>
                                        <td><input type="radio" name="question3"  value="5" ></td>
                                        <td><input type="radio" name="question3"  value="4" ></td>
                                        <td><input type="radio" name="question3"  value="3" ></td>
                                        <td><input type="radio" name="question3"  value="2" ></td>
                                        <td><input type="radio" name="question3"  value="1" ></td>
                                    <tr class="odd gradeA"> 
                                        <td>4</td>
                                        <td>Internet Explorer 6</td>
                                        <td><input type="radio" name="question4"  value="5" ></td>
                                        <td><input type="radio" name="question4"  value="4" ></td>
                                        <td><input type="radio" name="question4"  value="3" ></td>
                                        <td><input type="radio" name="question4"  value="2" ></td>
                                        <td><input type="radio" name="question4"  value="1" ></td>
                                    </tr>
                                    <tr class="odd gradeA">
                                        <td>5</td>
                                        <td>Internet Explorer 7</td>
                                        <td><input type="radio" name="question5"  value="5" ></td>
                                        <td><input type="radio" name="question5"  value="4" ></td>
                                        <td><input type="radio" name="question5"  value="3" ></td>
                                        <td><input type="radio" name="question5"  value="2" ></td>
                                        <td><input type="radio" name="question5"  value="1" ></td>
                                    </tr>
                                    <tr class="even gradeA">
                                        <td>6</td>
                                        <td>AOL browser (AOL desktop)</td>
                                        <td><input type="radio" name="question6"  value="5" ></td>
                                        <td><input type="radio" name="question6"  value="4" ></td>
                                        <td><input type="radio" name="question6"  value="3" ></td>
                                        <td><input type="radio" name="question6"  value="2" ></td>
                                        <td><input type="radio" name="question6"  value="1" ></td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>7</td>
                                        <td>Firefox 1.0</td>
                                        <td><input type="radio" name="question7"  value="5" ></td>
                                        <td><input type="radio" name="question7"  value="4" ></td>
                                        <td><input type="radio" name="question7"  value="3" ></td>
                                        <td><input type="radio" name="question7"  value="2" ></td>
                                        <td><input type="radio" name="question7"  value="1" ></td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>8</td>
                                        <td>Firefox 1.5</td>
                                        <td><input type="radio" name="question8"  value="5" ></td>
                                        <td><input type="radio" name="question8"  value="4" ></td>
                                        <td><input type="radio" name="question8"  value="3" ></td>
                                        <td><input type="radio" name="question8"  value="2" ></td>
                                        <td><input type="radio" name="question8"  value="1" ></td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>9</td>
                                        <td>Firefox 2.0</td>
                                        <td><input type="radio" name="question9"  value="5" ></td>
                                        <td><input type="radio" name="question9"  value="4" ></td>
                                        <td><input type="radio" name="question9"  value="3" ></td>
                                        <td><input type="radio" name="question9"  value="2" ></td>
                                        <td><input type="radio" name="question9"  value="1" ></td>
                                    </tr>
                                    <tr class="gradeA">
                                        <td>10</td>
                                        <td>Firefox 3.0</td>
                                        <td><input type="radio" name="question10"  value="5" ></td>
                                        <td><input type="radio" name="question10"  value="4" ></td>
                                        <td><input type="radio" name="question10"  value="3" ></td>
                                        <td><input type="radio" name="question10"  value="2" ></td>
                                        <td><input type="radio" name="question10"  value="1" ></td>

                                    </tr>
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

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
                <h1 class="page-header">Overtime Detail</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-4">
            </div>
            <div class="col-lg-8 detail">
                <div class="panel panel-default">
                    <div class="panel-heading">
                    </div>
                    <div class="panel-body">
                        <div class = "content">
                            <form class = "form-horizontal">
                                <div class = "form-group">
                                    <label class="col-md-4 control-label">Date </label>
                                    <div class = "right-side">
                                        <label class="col-md-6">: 2/2/2016</label>
                                    </div>
                                </div>
                                <div class = "form-group">
                                    <label class="col-md-4 control-label">Time </label>
                                    <div class = "right-side">
                                        <label class="col-md-6">: 4/2/2016</label>
                                    </div>
                                </div>
                                <div class = "form-group">
                                    <label class="col-md-4 control-label">Total Hours </label>
                                    <div class = "right-side">
                                        <label class="col-md-6">: 4/2/2016</label>
                                    </div>
                                </div>
                                <div class = "form-group">
                                    <label class="col-md-4 control-label">Status </label>
                                    <div class = "right-side">
                                        <label class="col-md-6">: Approved by HR </label>
                                    </div>
                                </div>
                                <div class = "form-group">
                                        <label class="col-md-4 control-label">Description </label>
                                    <div class = "right-side">
                                        <label class="col-md-6">: Sequence Diagram:  terlampir sequence diagram parent use case melihat detil.
                                        Sequence diagram melihat detil pengajuan kerja remote mengikuti sequence diagram parent-nya, yaitu melihat detil. Beberapa hal yang harus disesuaikan adalah </label>
                                    </div>
                                </div>
                            </form>
                                    <div class="form-group">
                                            <div class="col-md-6 control-label"></div>
                                            <div class = "col-md-2 col-md-offset-3">
                                                <a href="myOvertime" class="btn btn-default" role="button">Back</a>
                                            </div>
                                        </div>

                                    <!--row-->
                        </div><!--content-->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-8 -->
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
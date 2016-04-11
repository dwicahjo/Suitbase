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
                <h1 class="page-header">Feedback Detail</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
<<<<<<< HEAD

        <div class="row">
<<<<<<< HEAD
            
=======

>>>>>>> 2c597105d518500ff6ce263e6dcf3c8fe7732c1a
        </div>

=======
>>>>>>> 315374fbeca3037a61b981f8166a7cacbe3801bc
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
                                    {{$feedback[0]->description}}
                                </div>
                            </form>
                                    <div class="form-group">
<<<<<<< HEAD
<<<<<<< HEAD
                                        Lorem ipsum dolor sit amet, no eam vero lucilius tacimates, cum id suavitate honestatis. No mel sanctus democritum. Omnes decore noluisse te mei, idque aperiri rationibus at eos, in nam ferri assueverit. Ne aliquid vocibus vim, mel causae scribentur at, quo dictas omnesque interesset eu. Voluptua sapientem in eam, et sea essent eligendi rationibus.
                                    <div class="row">
                                    <br> 
=======
                                        {{$feedback[0]->description}}
                                    <div class="row">
                                    <br>
>>>>>>> 2c597105d518500ff6ce263e6dcf3c8fe7732c1a
                                        <div class="col-lg-5">
                                        </div>
                                        <div class="col-lg-7">
                                          <a href="listOfFeedback" class="btn btn-default" role="button">Back</a>
=======
                                            <div class="col-md-6 control-label"></div>
                                            <div class = "col-md-2 col-md-offset-3">
                                                <a href="listOfFeedback" class="btn btn-default" role="button">Back</a>
                                            </div>
>>>>>>> 315374fbeca3037a61b981f8166a7cacbe3801bc
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
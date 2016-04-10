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
                <h1 class="page-header">Create Appraisal Form</h1>
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
                            <div class="col-lg-6">
                                <form role="form">
                                    <div class="form-group">
                                        <label>Title</label>
                                        <input class="form-control" name = "title" required>
                                    </div>
                                    <div class="form-group">
                                        <label>Division</label>
                                            <select class="form-control" name = "division">
                                            <option>PR</option>
                                            <option>IT</option>
                                            <option>Finance</option>
                                            <option>Creative</option>
                                            </select>                                    
                                    </div>
                                    
                                    <div class="form-group">
                                        <label>Question 1</label>
                                        <textarea class ="form-control" name = "question" required> </textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Question 2</label>
                                        <textarea class ="form-control" name = "question" required> </textarea>
                                    </div>
                                    <div class="form-group">
                                        <label>Question 3</label>
                                        <textarea class ="form-control" name = "question" required> </textarea>
                                    </div>

                                    <button type="submit" class="btn btn-default">Add more questions</button>
                                </form>
                            </div>
                            
                        </div>
                        <!-- /.row (nested) -->
                    </div>
                    <!-- /.panel-body -->
                </div>
                <!-- /.panel -->
            </div>
            <!-- /.col-lg-12 -->
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

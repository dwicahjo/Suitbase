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
                            <div class="col-lg-11">
                                <div class = "content-form">
                                    <form class = "form-horizontal" role="form">
                                        <div class="form-group">
                                            <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                            <label class="col-md-4 control-label" required>Title</label>
                                            <div class = "col-md-6">
                                                <input class="form-control" name = "title" required>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Division</label>
                                            <div class = "col-md-6">
                                                <select class="form-control" name = "division">
                                                    <option>PR</option>
                                                    <option>HR</option>
                                                    <option>Creative</option>
                                                    <option>IT</option>
                                                </select>
                                            </div> 
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Question </label>
                                            <div class = "col-md-6">
                                               <input class= "form-control" type="text" name="mytext[]">
                                            </div>
                                        </div>
                                        
                                        <!--<div class="form-group">
                                            <label class="col-md-4 control-label">Question 2</label>
                                            <div class = "col-md-6">
                                                <textarea class ="form-control" name = "reason" required> </textarea>
                                            </div>
                                        </div>

                                        

                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Question 3</label>
                                            <div class = "col-md-6">
                                                <textarea class ="form-control" name = "reason" required> </textarea>
                                            </div>
                                        </div>
                                        
                                        <button type="submit" class="btn btn-default">Add more question</button>
                                        -->
                                        
                                    </form>
                                    <button class="add-question add_field_button btn btn-default">Add Question</button> 
                                    <div class="form-group">
                                            <div class="col-md-5 control-label"></div>
                                            <div class = "col-md-2 col-md-offset-3">
                                                <button type="submit" class="save btn btn-default">Save</button>
                                            </div>
                                    </div>

                                </div>
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
    <script src="/js/createAppraisal.js"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src="/assets/plugins/bootstrap/dist/js/bootstrap.min.js"></script>

    <!-- Metis Menu Plugin JavaScript -->
    <script src="/assets/plugins/metisMenu/dist/metisMenu.min.js"></script>

    <!-- Custom Theme JavaScript -->
    <script src="/assets/js/sb-admin-2.js"></script>

</body>

</html>

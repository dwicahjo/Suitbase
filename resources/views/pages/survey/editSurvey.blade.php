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
                <h1 class="page-header">Edit Survey Form</h1>
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
                            <div class="col-lg-12">
                                <div class = "content-form">
                                    <form class = "form-horizontal" role="form">
                                        <div class="form-group">
                                            <input name="_token" type="hidden" value="{{ csrf_token() }}">
                                            <label class="col-md-4 control-label">Survey Title</label>
                                            <div class = "col-md-6">
                                                <input class="form-control" name = "title" placeholder = "Old content" required> 
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Author</label>
                                            <div class = "col-md-6">
                                                <input class="form-control" name = "author" placeholder = "Old content" required>
                                            </div> 
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Date</label>
                                            <div class = "col-md-6">
                                                <input class="form-control" name = "author" type = "date" placeholder = "Old content" required>             
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Question 1</label>
                                            <div class = "col-md-6">
                                                <textarea class ="form-control" name = "reason"  placeholder = "Old content" required> </textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                        <label class="col-md-4 control-label">Answer Type</label>
                                            <div class = "col-md-6">
                                                <select class="form-control" name = "answer-type">
                                                    <option selected>Text</option>
                                                    <option>Multiple Choice</option>
                                                    <option>Checkbox</option>
                                                </select>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Question 2</label>
                                            <div class = "col-md-6">
                                                <textarea class ="form-control" name = "reason"  placeholder = "Old content" required> </textarea>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Answer Type</label>
                                            <div class = "col-md-6">
                                                <select class="form-control" name = "answer-type">
                                                    <option>Text</option>
                                                    <option selected>Multiple Choice</option>
                                                    <option>Checkbox</option>
                                                </select>
                                            </div>

                                            <div class = "col-md-4 control-label">
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="optionsRadios" id="optionsRadios1" value="option1" checked>Option 1
                                                        <input class="form-control" name = "option1"  placeholder = "Old content" required>
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <input type="radio" name="optionsRadios" id="optionsRadios2" value="option2">Option 2
                                                        <input class="form-control" name = "option2"  placeholder = "Old content" required>
                                                    </label>
                                                </div>
                                                <div class="radio">
                                                    <label>
                                                        <button type="submit" class="btn btn-default">Add more options</button>
                                                    </label>
                                                </div>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Question 3</label>
                                            <div class = "col-md-6">
                                                <textarea class ="form-control" name = "reason"  placeholder = "Old content" required> </textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                        <label class="col-md-4 control-label">Answer Type</label>
                                        <div class = "col-md-6">
                                            <select class="form-control" name = "answer-type">
                                                <option>Text</option>
                                                <option>Multiple Choice</option>
                                                <option selected>Checkbox</option>
                                            </select>
                                        </div>

                                        <div class = "col-md-4 control-label">
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">Checkbox 1
                                                    <input class="form-control" name = "checkbox1"  placeholder = "Old content" required>
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <input type="checkbox" value="">Checkbox 2
                                                    <input class="form-control" name = "checkbox2"  placeholder = "Old content" required>
                                                </label>
                                            </div>
                                            <div class="checkbox">
                                                <label>
                                                    <button type="submit" class="btn btn-default">Add more options</button>
                                                </label>
                                            </div>
                                        </div>
                                    </div>
                                    </form>
                                </div>
                                <div class = "button-right">
                                    <button type="submit" class="btn btn-default">Save</button>
                                </div>
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

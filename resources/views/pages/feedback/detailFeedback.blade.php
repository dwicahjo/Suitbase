@extends('layoutTemplate')
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">Feedback Detail</h1>
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
                                <div class = "detail-feedback">
                                    {{$feedback[0]->description}}
                                </div>
                            </form>
                                        <div class="form-group">
                                            <div class="col-md-6 control-label"></div>
                                            <div class = "col-md-2 col-md-offset-3">
                                                <a href="{{route('feedback.list')}}" class="btn btn-default" role="button">Back</a>
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

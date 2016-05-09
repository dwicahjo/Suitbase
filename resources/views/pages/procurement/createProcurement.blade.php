@extends('layoutTemplate')
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">CREATE PROCUREMENT REQUEST</h1>
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
                            <div class="col-lg-9 col-lg-offset-2">
                                    <form class = "form-horizontal" role="form" method="post" action="/storeProcurement">
                                        <div class="form-group">
                                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                            <label class="col-md-4 control-label" style = "{{ $errors->has('title') ? 'color:red' : '' }}">Title</label>
                                            <div class = "col-md-6">
                                                <input class="form-control" name = "title" type = "text" required>
                                                @if ($errors->has('title'))
                                                    <span class="help-block">
                                                        <strong style = "{{ $errors->has('title') ? 'color:red' : '' }}">{{ $errors->first('title') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="col-md-4 control-label" style = "{{ $errors->has('price_estimate') ? 'color:red' : '' }}">Price Estimate</label>
                                            <div class = "col-md-6">
                                                <input class="form-control" name = "price_estimate" type = "price_estimate" requiews>
                                                @if ($errors->has('price_estimate'))
                                                    <span class="help-block">
                                                        <strong style = "{{ $errors->has('price_estimate') ? 'color:red' : '' }}">{{ $errors->first('price_estimate') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label" style = "{{ $errors->has('description') ? 'color:red' : '' }}">Description</label>
                                            <div class = "col-md-6">
                                                <textarea class ="form-control" name = "description" required></textarea>
                                                @if ($errors->has('description'))
                                                    <span class="help-block">
                                                        <strong style = "{{ $errors->has('price_estimate') ? 'color:red' : '' }}">{{ $errors->first('description') }}</strong>
                                                    </span>
                                                @endif
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-md-6 col-md-offset-4">
                                                <button type="submit" class="btn btn-primary">
                                                    Submit
                                                </button>
                                            </div>
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

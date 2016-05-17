@extends('layoutTemplate')
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">EDIT PROCUREMENT REQUEST</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        @if (Session::has('success'))
            <div class = "alert alert-success">
                {{ Session::get('success') }}
            </div>
        @endif
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                    </div>
                    <div class="panel-body">
                        <div class="row">
                            <div class="col-lg-9 col-lg-offset-2">
                                    <form class = "form-horizontal" role="form" method = "post" action = "{{ route('procurements.postEdit') }}">
                                        <div class="form-group">
                                            <input type="hidden" name="_token" value="<?php echo csrf_token(); ?>">
                                            <input class="form-control" name = "id" type = "hidden" value = "{{ $procurements[0]->id }}">
                                            <label class="col-md-4 control-label">Title</label>
                                            <div class = "col-md-6">
                                                <input class="form-control" name = "title" type = "text" required value = "{{ $procurements[0]->title }}">
                                            </div>
                                        </div>
                                        
                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Price Estimate</label>
                                            <div class = "col-md-6">
                                                <input class="form-control" name = "price_estimate" type = "price_estimate" value = "{{ $procurements[0]->estimate_price }}" required>
                                            </div>
                                        </div>

                                        <div class="form-group">
                                            <label class="col-md-4 control-label">Description</label>
                                            <div class = "col-md-6">
                                                <textarea class ="form-control" name = "reason" required>{{ $procurements[0]->description }} </textarea>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <div class="col-lg-1 col-md-offset-8">
                                                <button type="submit" class="btn btn-primary">Submit</button>                                                
                                                <a href="{{ route('procurements.list.current') }}" class="btn btn-default btn-left" role="button">Back</a>
                                            </div>
                                        </div>
                                    </form>
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
@extends('layoutTemplate')
@section('content')
    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">CREATE FEEDBACK</h1>
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
                    <form class="form-horizontal" role="form" method="POST" action="{{ url('/createFeedback') }}">
                        {!! csrf_field() !!}
                        <div class="row">
                            <div class="col-md-6 col-md-offset-3">
                                    <div class="form-group">
                                        <textarea name="description" class="form-control" rows="5" required></textarea>
                                    </div>

                                    <div class="row">
                                        <div class="col-lg-10 anon">
                                          <label>
                                            <input type="hidden" name="is_anonim" value="0" />
                                            <input type="checkbox" name="is_anonim" value="1"> Anonymous
                                          </label>
                                        </div>
                                           <input type="hidden" name="employees_id" value="{{ Auth::user()->id }}">
                                        <div class="col-lg-2 submit">
                                            <button type="submit" class="btn btn-primary btn-default">Submit</button>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </form>
                    <div class="myFeedback">
                    @foreach ($feedbacks as $feedback)
                        <div class="row">

                            <div class="col-lg-8">
                                    <div class="form-group" style="text-align: justify">
                                        {{$feedback->description}}
                                    <div class="row">
                                        <div class="col-lg-7">
                                        </div>
                                        <div class="col-lg-5 feedbackDate" style="text-align: right">
                                          {{$feedback->created_at}}
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach
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


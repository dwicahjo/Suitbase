@extends('layoutTemplate')
@section('content')

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">FEEDBACKS</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <div class="panel-heading">
                    </div>
                    <div class="row">
                    <div class="col-lg-12">
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>No. </th>
                                        <th>Timestamp </th>
                                        <th>Employee Name </th>
                                        <th>Division</th>
                                        <th>Description</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i=1; ?>
                                    @foreach ($feedbacks as $feedback)
                                    <tr class="odd gradeA">
                                        <td>{{$i}}</td>
                                        <td>{{$feedback->created_at}}</td>
                                    <!--kalo ngga anon-->
                                    <?php if($feedback->is_anonim==0){ ?>
                                        <td>{{$feedback->username}}</td>                                            
                                    <?php }else{ ?>
                                        <td>Anonymous</td>
                                    <?php } ?>
                                        <td>{{$feedback->division}}</td>
                                        <td><a href="/detailFeedback:{{$feedback->id}}">{{str_limit($feedback->description, $limit = 20, $end = '...')}}</a></td>
                                    </tr>
                                    <?php $i++; ?>
                                    @endforeach
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
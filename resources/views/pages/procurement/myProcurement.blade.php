@extends('layoutTemplate')
@section('content')

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">MY PROCUREMENT REQUESTS</h1>
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
                    <!--<div class="panel-heading">
                        DataTables Advanced Tables
                    </div>-->
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <thead>
                                    <tr>
                                        <th>No. </th>
                                        <th>Procurement Title</th>
                                        <th>Status</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1; ?>
                                    @foreach ($procurements as $procurement)
                                        <tr class="odd gradeX">
                                            <td class="center">{{ $i }}</td>
                                            <td>{{ $procurement->title }}</td>
                                            <td><a href="/myProcurements:{{ $procurement->id }}">{{ $procurement->status}}</a></td>
                                            <?php 
                                                $status = explode(" ", $procurement->status);
                                            ?>
                                            @if ($status[0] == "Rejected" || $status[0] == "Approved" || $status[0] == "Cancelled")
                                                <th>
                                                    <button type="submit" class="btn btn-default btn-info" disabled="">Edit</button>
                                                    <button type="submit" class="btn btn-default btn-danger" disabled="">Cancel</button>
                                                </th>
                                            @else
                                                <th><a href="/editProcurement:{{ $procurement->id }}" class="btn btn-default btn-info" role="button">Edit</a>
                                            <a href="/cancelProcurement:{{ $procurement->id }}" class="btn btn-default btn-danger" role="button">Cancel</a></th>
                                            @endif
                                        </tr>
                                        <?php $i++; ?>
                                    @endforeach
                                    {{ $procurements->render() }}
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
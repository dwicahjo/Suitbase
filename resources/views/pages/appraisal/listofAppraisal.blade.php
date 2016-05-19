@extends('layoutTemplate')
@section('content')

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">LIST OF APPRAISALS</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
                <div class="panel-heading">
                </div>
                <!-- /.panel-heading -->
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-12">
                            <div class="row">
                                <div class="dataTable_wrapper">
                                    <table class="table table-striped table-bordered table-hover" id="dataTables-example">

                                        <thead>
                                            <tr>
                                                <th style="text-align: center">No</th>
                                                <th style="text-align: center">Title</th>
                                                <th style="text-align: center">Date Start</th>
                                                <th style="text-align: center">Date End</th>
                                                <th style="text-align: center">Employee Name</th>
                                                <th style="text-align: center">Division</th>
                                                <th></th>
                                            </tr>
                                        </thead>
                                        <tbody style="text-align: center">
                                            <?php
                                                $today = date("Y-m-d");
                                            ?>
                                            <?php $i=1; ?>
                                            @if (Auth::user()->type == "Supervisor")
                                                @foreach ($appraisals as $appraisal)
                                                <tr class="odd gradeA">
                                                    <td>{{$i}}</td>
                                                    <td>{{$appraisal->appraisalsTemplate->title}}</td>
                                                    <td>{{$appraisal->appraisalsTemplate->date_start}}</td>
                                                    <td>{{$appraisal->appraisalsTemplate->date_end}}</td>
                                                    <td>{{$appraisal->employee->name}}</a></td>
                                                    <td>{{$appraisal->division->name}}</td>
                                                    <th>
                                                        <a href="{{route('appraisal.detail',['id' =>$appraisal->id])}}" class="btn btn-default" role="button">Detail</a>

                                                        @if($appraisal->appraisalsTemplate->date_end >= $today)
                                                            <a href="{{route('appraisal.fill',['id' =>$appraisal->id])}}" class="btn btn-default btn-info" role="button">Fill Appraisal</a>
                                                        @else
                                                            <button type="submit" class="btn btn-default btn-info" disabled="">Fill Appraisal</button>
                                                        @endif
                                                    </th>
                                                </tr>
                                                <?php $i++; ?>
                                                @endforeach
                                            @else
                                                @foreach ($appraisals as $appraisal)
                                                    <tr class="odd gradeA">
                                                        <td>{{$i}}</td>
                                                        <td>{{$appraisal->appraisalsTemplate->title}}</td>
                                                        <td>{{$appraisal->appraisalsTemplate->date_start}}</td>
                                                        <td>{{$appraisal->appraisalsTemplate->date_end}}</td>
                                                        <td>{{$appraisal->employee->name}}</a></td>
                                                        <td>{{$appraisal->division->name}}</td>
                                                        <td><a href="{{route('appraisal.detail',['id' =>$appraisal->id])}}" class="btn btn-default" role="button">Detail</a></td>
                                                    </tr>
                                                    <?php $i++; ?>
                                                @endforeach
                                            @endif
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div> <!--row-->
                            </div>
                        </div>
                        <!-- /.table-responsive -->
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

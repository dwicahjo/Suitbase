@extends('layoutTemplate')
@section('content')

    <div id="page-wrapper">
        <div class="row">
            <div class="col-lg-12">
                <h1 class="page-header">APPRAISAL TEMPLATE</h1>
            </div>
            <!-- /.col-lg-12 -->
        </div>
        @if (count($errors) > 0)
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
            <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif
    @if (Session::has('success'))
    <div class = "alert alert-success">
        {{ Session::get('success') }}
    </div>
    @endif
        <!-- /.row -->
        <div class="row">
            <div class="col-lg-12">
                <div class="panel panel-default">
                    <!--<div class="panel-heading">
                        DataTables Advanced Tables
                    </div>-->
                    <!-- /.panel-heading -->
                    <div class="panel-body">
                        <div class="dataTable_wrapper">
                            <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                                <a href="{{ route('appraisal.create')}}">
                                    <i class="fa fa-plus fa-fw"></i>
                                    <label>
                                        Create Apprasial Template
                                    </label>
                                </a>
                                <thead>
                                    <tr>
                                        <th style="text-align: center">No</th>
                                        <th style="text-align: center">Title</th>
                                        <th style="text-align: center">Date Start</th>
                                        <th style="text-align: center">Date End</th>
                                        <th style="text-align: center">Appraisal Title</th>
                                        <th style="text-align: center">Appraisal Template</th>
                                        <th></th>
                                    </tr>
                                </thead>
                                <tbody style="text-align: center">
                                    <?php $i=1; ?>
                                    @foreach ($appraisalsTemplate as $appraisalTemplate)
                                        <tr class="odd gradeA">
                                            <td>{{$i}}</td>
                                            <td>{{$appraisalTemplate->title}}</td>
                                            <td>{{$appraisalTemplate->date_start}}</td>
                                            <td>{{$appraisalTemplate->date_end}}</td>
                                            <td>{{$appraisalTemplate->title}}</td>
                                            <td>{{$appraisalTemplate->division->name}}</td>
                                            <td><a href="{{ route('appraisal.template.detail', ['id' => $appraisalTemplate->id]) }}" class="btn btn-default" role="button">Detail</a>
                                                <?php
                                                    $today = date("Y-m-d");
                                                ?>
                                                @if($appraisalTemplate->date_start > $today)
                                                     <a href="{{ route('appraisal.edit', ['id' => $appraisalTemplate->id]) }}" class="btn btn-default btn-info" role="button">Edit</a>
                                                @else
                                                    <button type="submit" class="btn btn-default btn-info" disabled="">Edit</button>
                                                @endif

                                                @if($appraisalTemplate->date_end < $today)
                                                    <a href="{{ route('appraisal.recap',$appraisalTemplate->id) }}" class="btn btn-default" role="button">View Recap</a>
                                                @else
                                                    <button type="submit" class="btn btn-default btn-default" disabled="">View Recap</button>
                                                @endif
                                            </td>
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

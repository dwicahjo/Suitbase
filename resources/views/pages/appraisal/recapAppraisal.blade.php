@extends('layoutTemplate')
@section('content')

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">RECAP OF APPRAISAL</h1>
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
                {{-- <div class="menu-survey">
                    <a href="#">
                        <i class="fa fa-plus fa-fw"></i>
                        <label>
                            Create Survey
                        </label>
                    </a>
                </div> --}}

                <div class="panel-body">
                    <div class="dataTable_wrapper">
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>Periode</th>
                                    <th>Dept. Rank</th>
                                    <th>Department</th>
                                    <th>Average</th>
                                    <th>Employee Rank</th>
                                    <th>Name</th>
                                    <th>Grade</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="odd gradeA">
                                    <td>Juni, 2015</td>
                                    <td>1</td>
                                    <td>Engineering</td>
                                    <td>80</td>
                                    <td>1</td>
                                    <td>Alisha Alija</td>
                                    <td>90</td>
                                </tr>
                                <tr class="odd gradeA">
                                    <td>Juni, 2015</td>
                                    <td>1</td>
                                    <td>Engineering</td>
                                    <td>80</td>
                                    <td>1</td>
                                    <td>Alisha Alija</td>
                                    <td>90</td>
                                </tr>
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

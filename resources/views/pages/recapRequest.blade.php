@extends('layoutTemplate')
@section('content')

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">Recap of Survey</h1>
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
                        <select>
                        <option>Question 1</option>
                        </select>
                        <table class="table table-striped table-bordered table-hover" id="dataTables-example">
                            <thead>
                                <tr>
                                    <th>Name</th>
                                    <th>Division</th>
                                    <th>Answer</th>
                                </tr>
                            </thead>
                            <tbody>
                                <tr class="odd gradeA">
                                    <td>Ali</td>
                                    <td>IT</td>
                                    <td>cat</td>
                                    </tr>
                                <tr class="odd gradeA">
                                    <td>Alija</td>
                                    <td>HR</td>
                                    <td>test</td>
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

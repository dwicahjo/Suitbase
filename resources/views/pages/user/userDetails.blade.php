@extends('layoutTemplate') 
@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header"></h1>
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
                    <div class="titleProfile">
                        <label>PROFILE</label>
                    </div>

                    <div class="row">
                        <div class="col-lg-5">
                            <div class="row">
                                 <div class="col-lg-12">
                                    <img alt="image" class="img-responsive" src="upload/photos/{{ $user[0]->photo }}">
                                </div>
                            </div>
                        </div> <!--col-lg-6-->

                        <div class="col-lg-7">
                            <div class="table-responsive">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>Email</td>
                                            <td>{{ $user[0]->email }}</td>
                                        </tr>
                                        <tr>
                                            <td>Role</td>
                                            <td>{{ $user[0]->divisions_id }}</td>
                                        </tr>
                                        <tr>
                                            <td>Full Name</td>
                                            <td>{{ $user[0]->name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Birth Place</td>
                                            <td>{{ $user[0]->birth_place }}</td>
                                        </tr>
                                        <tr>
                                            <td>Birth Date</td>
                                            <td>{{ $user[0]->birth_date }}</td>
                                        </tr>
                                        <tr>
                                            <td>Gender</td>
                                            <td>{{ $user[0]->gender }}</td>
                                        </tr>
                                        <tr>
                                            <td>Religion</td>
                                            <td>{{ $user[0]->religion }}</td>
                                        </tr>
                                        <tr>
                                            <td>KTP Number</td>
                                            <td>{{ $user[0]->ktp_id }}</td>
                                        </tr>
                                        <tr>                                    
                                            <td>NPWP Number</td>
                                            <td>{{ $user[0]->NPWP }}</td>
                                        </tr>
                                        <tr>
                                            <td>KTP Address</td>
                                            <td>{{ $user[0]->ktp_address }}</td>
                                        </tr>
                                        <tr>
                                            <td>Current Address</td>
                                            <td>{{ $user[0]->address }}</td>
                                        </tr>
                                        <tr>
                                            <td>Phone Number</td>
                                            <td>{{ $user[0]->phone }}</td>
                                        </tr>
                                        <tr>
                                            <td>Curriculum Vitae</td>
                                            <td><a href="{{ $user[0]->CV }}">CV</a></td>
                                        </tr>
                                        <tr>
                                            <td>KTP</td>
                                            <td><a href="{{ $user[0]->ktp_id }}">KTP</td>
                                        </tr>
                                        <tr>
                                            <td>Ijazah</td>
                                            <td><a href="{{ $user[0]->ijazah }}">Ijazah</a></td>
                                        </tr>
                                        <tr>
                                            <td>Kartu Keluarga</td>
                                            <td><a href="{{ $user[0]->KK }}">KK</a></td>
                                        </tr>
                                        <tr>
                                            <td></td>
                                            <td></td>
                                        </tr>
                                     </tbody>
                                </table>
                                <div class="row">
                                    <div class="form-group">
                                        <div class="col-md-6">
                                            <a href="/listOfUser" class="btn btn-default" role="button">Back</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <!-- /.table-responsive -->
                        </div> <!--col-lg-6-->
                    </div> <!--row-->
                </div>
            </div>
        <div>
    </div>
</div><!-- /#wrapper -->
             @endsection

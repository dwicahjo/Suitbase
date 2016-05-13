@extends('layoutTemplate')
@section('content')
<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">MY PROFILE</h1>
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
                        <div class="col-lg-5">
                            <div class="row">
                                <div class="col-lg-6 col-lg-offset-4">
                                    <img alt="image" class="img-circle img-responsive" src="{{ asset('/upload/photos/' . Auth::user()->photo) }}">
                               </div>
                            </div> <!--row-->
                        </div> <!--col-lg-6-->

                        <div class="col-lg-7">
                                <table class="table">
                                    <tbody>
                                        <tr>
                                            <td>Email</td>
                                            <td>{{ Auth::user()->email }}</td>
                                        </tr>
                                        <tr>
                                            <td>Role</td>
                                            <td>{{ Auth::user()->divisions_id}}</td>
                                        </tr>
                                        <tr>
                                            <td>Full Name</td>
                                            <td>{{ Auth::user()->name }}</td>
                                        </tr>
                                        <tr>
                                            <td>Birth Place</td>
                                            <td>{{ Auth::user()->birth_place }}</td>
                                        </tr>
                                        <tr>
                                            <td>Birth Date</td>
                                            <td>{{ Auth::user()->birth_date }}</td>
                                        </tr>
                                        <tr>
                                            <td>Gender</td>
                                            <td>{{ Auth::user()->gender }}</td>
                                        </tr>
                                        <tr>
                                            <td>Religion</td>
                                            <td>{{ Auth::user()->religion }}</td>
                                        </tr>
                                        <tr>
                                            <td>KTP Number</td>
                                            <td>{{ Auth::user()->ktp_id }}</td>
                                        </tr>
                                        <tr>                                    
                                            <td>NPWP Number</td>
                                            <td>{{ Auth::user()->NPWP }}</td>
                                        </tr>
                                        <tr>
                                            <td>KTP Address</td>
                                            <td>{{ Auth::user()->ktp_address }}</td>
                                        </tr>
                                        <tr>
                                            <td>Current Address</td>
                                            <td>{{ Auth::user()->address }}</td>
                                        </tr>
                                        <tr>
                                            <td>Phone Number</td>
                                            <td>{{ Auth::user()->phone }}</td>
                                        </tr>
                                        <tr>
                                            <td>Curriculum Vitae</td>
                                            @if (Auth::user()->CV == "")
                                                <td>Not Available</td>
                                            @else
                                                <td><a href="/download:1">CV</a></td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <td>KTP</td>
                                            @if (Auth::user()->KTP == "")
                                                <td>Not Available</td>
                                            @else
                                                <td><a href="{{ Auth::user()->getKtpUrl() }}">KTP</td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <td>Ijazah</td>
                                            @if (Auth::user()->ijazah == "")
                                                <td>Not Available</td>
                                            @else
                                                <td><a href="/download:3">Ijazah</a></td>
                                            @endif
                                        </tr>
                                        <tr>
                                            <td>Kartu Keluarga</td>
                                            @if (Auth::user()->KK == "")
                                                <td>Not Available</td>
                                            @else
                                                <td><a href="/download:4">KK</a></td>
                                            @endif
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
                                            <a href="{{ route('user.edit.current') }}" class="btn btn-default" role="button">Edit Profile</a>
                                        </div>
                                    </div>
                                </div>
                        </div> <!--col-lg-7-->
                    </div> <!--row-->
                </div><!-- /.panel-body -->

            </div>
        </div>
    </div>
</div> <!-- /#wrapper -->
             @endsection
@extends('layoutTemplate')
@section('content')

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="page-header">EDIT PROFILE</h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
    <!-- /.row -->
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
    <div class="row">
        <div class="col-lg-12">
            <div class="panel panel-default">
            <div class="panel-heading">
            </div>
                <div class="panel-body">
                    <div class="row">
                        <div class="col-lg-6" style= "width:50%">
                        <form role="form" enctype="multipart/form-data" method = "post" action = "{{ route('user.postImage') }}">
                            <input name="_token" type="hidden" value="{{ csrf_token() }}">
                            <input name="user_id" type="hidden" value="{{ $user->id }}">
                            <div class="col-image">
                            <span>
                                 <img alt="image" class="img-responsive img-circle" src="{{ url('/upload/photos/' . $user->photo) }}">
                             </span>          
                            <input style="margin-top:3%" type="file" class="upload" name = "image" />
                            <br>
                            <button type="submit" class="btn btn-default">Upload Photo</button> 
                        </form>
                        </div>
                        </div>

        <div class="col-lg-6">
            <form role="form" enctype="multipart/form-data" method = "post" action = "{{ route('user.postEdit') }}">
                <input name="_token" type="hidden" value="{{ csrf_token() }}">
                <input name="user_id" type="hidden" value="{{ $user->id }}">
                <div class="form-group">
                    <label>New Password</label>
                    <input class="form-control" name = "password" type = "password">
                </div>
                <div class="form-group">
                    <label>Repeat New Password</label>
                    <input class="form-control" name = "repeatPass" type = "password">
                </div>
                
                <div class="form-group">
                    <label>Full Name</label>
                    <input class="form-control" name = "fullname" type = "text" value = "{{ $user->name }}" required>
                </div>
                <div class="form-group">
                    <label>Birth Place</label>
                    <input class="form-control" name = "birthplace" type = "text" value = "{{ $user->birth_place }}"required>
                </div>
                <div class="form-group">
                    <label>Birth Date</label>
                    <input class="form-control" name = "birthdate" type = "date" value = "{{ $user->birth_date }}" required>
                </div>
                <div class="form-group">
                    <label>Gender</label>
                    <select class="form-control" name = "gender">
                        @if ($user->gender == 'Male')
                            <option selected>Male</option>
                            <option>Female</option>
                        @else
                            <option>Male</option>
                            <option selected>Female</option>
                        @endif
                    </select>
                </div>
                <div class="form-group">
                    <label>Religion</label>
                    <input class="form-control" name = "religion" type = "text" value = "{{ $user->religion }}" required>
                </div>

                <div class="form-group">
                    <label>KTP Number</label>
                    <input class="form-control" name = "ktpnumber" type = "text" value = "{{ $user->ktp_id }}" required>
                </div>
                <div class="form-group">
                    <label>NPWP Number</label>
                    <input class="form-control" name = "npwpnumber" type = "text" value = "{{ $user->NPWP }}" required>
                </div>

                <div class="form-group">
                    <label>KTP Address</label>
                    <textarea class ="form-control" name = "ktpAddress" required>{{ $user->ktp_address }}</textarea>
                </div>
                <div class="form-group">
                    <label>Current Address</label>
                    <textarea class ="form-control" name = "currentAddress" required>{{ $user->address }}</textarea>
                </div>
                <div class="form-group">
                    <label>Telephone Number</label>
                    <input class="form-control" name = "tlpnumber" type = "text" value = "{{ $user->phone }}" required>
                </div>
                <label>Curriculum Vitae</label>
                    <input type="file" class="upload" name = "CV" />
                <br>
                <label>KTP</label>
                    <input type="file" class="upload" name = "KTP" />
                <br>
                <label>Ijazah</label>
                    <input type="file" class="upload" name = "ijazah" />
                <br>
                <label>Kartu Keluarga</label>
                    <input type="file" class="upload" name = "KK" />
                <br>
                <button type="submit" class="btn btn-default">Save</button>   
            </form>
        </div>
</div>
<!-- /#wrapper -->
@endsection
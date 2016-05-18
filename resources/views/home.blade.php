@extends('layoutTemplate')
@section('content')

<div id="page-wrapper">
    <div class="row">
        <div class="col-lg-12">
            <h1 class="welcome">WELCOME TO SUITBASE, </h1>
            <h1><p class="name"> {{ Auth::user()->name }} ! </p></h1>
        </div>
        <!-- /.col-lg-12 -->
    </div>
 
    <!-- /#page-wrapper -->
    @endsection

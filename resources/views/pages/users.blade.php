@extends('layout')

@section('content')
<h1> The About Page </h1>
@foreach ($users as $user)
{{$user->id}}
{{$user->name}}
@endforeach
@stop
@extends('layout')
@section('title',"Home page")
@section('content')

@auth
{{auth()->User()->name}}
@endauth


@endsection

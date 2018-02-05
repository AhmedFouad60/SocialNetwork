@extends('layouts.master')
@section('title')
    SignIn !
@endsection
@section('css')
    <link rel="stylesheet" href="{{URL::to('css/signUPINForm.css')}}">
@endsection
@section('content')
    @include('includes.message-block')
    @include('includes.signinFrom')


@endsection

@extends('layouts.master')
@section('title')
    Welcome !
@endsection
@section('css')
    <link rel="stylesheet" href="{{URL::to('css/signUPINForm.css')}}">
@endsection
@section('content')
    @include('includes.message-block')
    @include('includes.signUpForm')


@endsection

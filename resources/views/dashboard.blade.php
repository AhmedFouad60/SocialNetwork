@extends('layouts.master')
@section('title')
    Dashboard !
@endsection
@section('content')
    @include('includes.header')
    @include('includes.message-block')
    @include('includes.newPostForm')
    @include('includes.allPosts')
    @include('includes.modal')


@endsection

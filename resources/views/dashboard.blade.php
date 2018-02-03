@extends('layouts.master')
@section('title')
    Dashboard !
@endsection
@section('content')
    @include('includes.header')
    @include('includes.newPostForm')
    @include('includes.allPosts')


@endsection

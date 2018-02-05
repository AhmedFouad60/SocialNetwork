@extends('layouts.master')
@section('title')
    profile !
@endsection
@section('css')
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
          rel="stylesheet">
@endsection

@section('content')
    @include('includes.header')
    @include('includes.profile')
    @include('layouts.profileEditModal')

    @include('includes.newPostForm')
    @include('includes.allPosts')
    @include('layouts.postModal')

@endsection

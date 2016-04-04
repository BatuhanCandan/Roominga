@extends('layouts.default')
@section('content')
    {{ HTML::style('dropzone/css/basic.css') }}
    {{ HTML::style('dropzone/css/dropzone.css') }}
    {{ HTML::script('assets/js/jquery.js') }}
    {{ HTML::script('dropzone/dropzone.js') }}

    <div class="form-page">
        <h1 class="form-title">Create Room</h1>
        @include('flash::message')
        @include('upload.fileUpload.index')
    </div>
@stop
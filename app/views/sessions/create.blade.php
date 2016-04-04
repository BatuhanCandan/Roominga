@extends('layouts.default')
@section('content')
    <div class="form-page">
        <h1 class="form-title">Sign In</h1>
        @include('flash::message')
        {{ Form::open(['route' => 'login_path']) }}
        <div class="form-group">
            {{ Form::label('email', 'Email:') }}
            {{ Form::email('email', null, ['class' => 'form-control', 'required' => 'required']) }}
        </div>
        <div class="form-group">
            {{ Form::label('password', 'Password:') }}
            {{ Form::password('password', ['class' => 'form-control', 'required' => 'required']) }}
        </div>
        <div class="form-group">
            {{ Form::submit('Sign In', ['class' => 'btn btn-primary']) }}
            {{ link_to('password/remind', 'Reset Your Password') }}
        </div>
        {{ Form::close() }}
    </div>


@stop
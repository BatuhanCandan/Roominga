@extends('layouts.default')
@section('content')

    <div class="form-page">
        <h1 class="form-title">Need to reset your password?</h1>
        {{ Form::open() }}
        <div class="form-group">
            {{ Form::label('email', 'Email:') }}
            {{ Form::email('email', null, ['class' => 'form-control', 'required']) }}
        </div>
        <div class="form-group">
            {{ Form::submit('Reset Password', ['class' => 'btn btn-primary form-control']) }}
        </div>
        {{ Form::close() }}
    </div>
@stop
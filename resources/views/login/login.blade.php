@extends('layouts.app')
@section('content')
    <h1>Login</h1>
    {!! Form::open(['action' => 'LoginController@login', 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('email', 'Email')}}
            {{Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Email', 'onchange' => "checkEmail()"])}}
        </div>
        <div class="form-group">
            {{Form::label('password', 'Password')}}
            {{Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password'))}}
        </div>
        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection
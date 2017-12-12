@extends('layouts.app')
@section('content')
    <a href="/users/{{$user->id}}" class="btn btn-default">Go Back</a>
    <h1>Update User</h1>
    {!! Form::open(['action' => ['UserController@update', $user->id], 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('name', 'Name')}}
            {{Form::text('name', $user->name, ['class' => 'form-control', 'placeholder' => 'Name'])}}
        </div>
        <div class="form-group">
            {{Form::label('password', 'Password')}}
            {{Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password'))}}
        </div>
        <div class="form-group">
            {{Form::label('password', 'Confirm Password')}}
            {{Form::password('confirmation', array('class' => 'form-control', 'placeholder' => 'Password'))}}
        </div>
        <div>
            {{Form::radio('access_level', '0', $user->access_level == 0)}}
            {{Form::label('access_level', 'Default')}}<br>
            {{Form::radio('access_level', '1', $user->access_level == 1)}}
            {{Form::label('access_level', 'Post Moderator')}}<br>
            {{Form::radio('access_level', '2', $user->access_level == 2)}}
            {{Form::label('access_level', 'Administrator')}}
        </div>
        <hr>
        {{Form::hidden('_method', 'PUT')}}
        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection
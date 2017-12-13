<!doctype html>
<html lang="{{ app()->getLocale() }}">
<head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="stylesheet" href="{{asset('css/app.css')}}">
        <title>{{ config('app.name', 'CarBay')}}</title>
    </head>
    <body>
@if (count($users) > 0)
    @foreach($users as $user)
        <div class="well">
            <h4><a href='/users/{{$user->id}}' target='_top'>{{$user->email}}</a></h4>
            <h5>Name: <a href='/users/{{$user->id}}'>{{$user->name}}</a></h5>
        </div>
    @endforeach
@endif
</body>
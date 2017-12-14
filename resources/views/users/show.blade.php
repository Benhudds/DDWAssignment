@extends('layouts.app')
@section('content')
    <h1>{{$user->name}}</h1>
    <div>
        <p>Email: {!!$user->email!!}</p>
    </div>
    <hr>
    @if (Session::has('user'))
        <?php $sessUser = Session::get('user'); ?>
        @if ($sessUser->access_level == 2 or $sessUser->user_id == $user->id)
            <a href="/users/{{$user->id}}/edit" class="btn btn-default"/>Edit</a>
            {!!Form::open(['action' => ['PostsController@destroy', $user->id], 'method' => 'POST', 'class' =>'pull-right'])!!}
                {{Form::hidden('_method', 'DELETE')}}
                {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
            {!!Form::close()!!}
        @endif
    @endif
@endsection
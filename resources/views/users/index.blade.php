@extends('layouts.app')
@section('content')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>
    function filterChanged() {
        $url = "/filteredUsers?access_level=" + document.getElementById("filter").value;
        document.getElementById("iframe").src = $url;
    }
</script>
    <h1>Users</h1>
    <hr>   
    <div class="text-right">
        {{Form::label('filtertxt', 'Filter: ')}}
        {{Form::select('filter', array('-1' => 'All', '0' => 'Default', '1' => 'Post Moderator', '2' => 'Administrator'), '-1',['onchange' => 'filterChanged()', 'id' => 'filter'])}}
    </div>
    <div class="embed-responsive embed-responsive-16by9">
  <iframe id="iframe" class="embed-responsive-item" src="/filteredUsers?access_level=-1" allowfullscreen></iframe>
</div>

@endsection
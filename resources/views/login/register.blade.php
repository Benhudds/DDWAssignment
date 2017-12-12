@extends('layouts.app')
@section('content')
<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.0/jquery.min.js"></script>
<script>
    function checkEmail() {
        $email = "email=" + document.getElementById("email").value;
        $.ajax({
            // create the AJAX request using JQuery method
            type: "POST", // method is post
            url: "users/checkavailability", // the controller function
            data: $email, // the data we're passing
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            success: function(data) {
                if (data.availability === false){
                    $("#email").css("background-color","#f99"); // change the CSS to give user feedback
                    $("#submit").prop('disabled',true); // disable the submit button
                }
                else if (data.availability === true){
                    $("#email").css("background-color","#9f9"); // change the CSS to give user feedback
                    $("#submit").prop('disabled',false); // enable the submit button
                }
            },
            dataType: "json" // returned data type is going to be JSON
        });
    }
</script>
    <h1>Register</h1>
    {!! Form::open(['action' => 'LoginController@register', 'method' => 'POST']) !!}
        <div class="form-group">
            {{Form::label('name', 'Name')}}
            {{Form::text('name', '', ['class' => 'form-control', 'placeholder' => 'Name'])}}
        </div>
        <div class="form-group">
            {{Form::label('email', 'Email')}}
            {{Form::text('email', '', ['class' => 'form-control', 'placeholder' => 'Email', 'onchange' => "checkEmail()"])}}
        </div>
        <div class="form-group">
            {{Form::label('password', 'Password')}}
            {{Form::password('password', array('class' => 'form-control', 'placeholder' => 'Password'))}}
        </div>
        <div class="form-group">
            {{Form::label('password', 'Confirm Password')}}
            {{Form::password('confirmation', array('class' => 'form-control', 'placeholder' => 'Password'))}}
        </div>
        {{Form::submit('Submit', ['class' => 'btn btn-primary'])}}
    {!! Form::close() !!}
@endsection
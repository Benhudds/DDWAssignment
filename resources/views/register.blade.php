<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Registration</title>
</head>
<body>
                    <div class="col-sm-4">
                        <div class="signup-form">
                            <h2>New User Signup!</h2>
                            <form method="POST" action="{{url('register_new')}}">
                                {!! csrf_field() !!}
                                <input type="text" name="first_name" id="first_name" placeholder="First Name"><br>
                                <input type="text" name="last_name" id="last_name"  placeholder="Last Name"><br>
                                <input type="email" name="email" placeholder="Email Address"/><br>
                                <input type="password" name="password" placeholder="Password"><br>
                                <button type="submit" class="btn btn-default">Signup</button>
                            </form>
                        </div>
                    </div>
</body>
</html>
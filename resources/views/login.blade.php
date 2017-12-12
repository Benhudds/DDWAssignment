<!doctype html>
<html>
<head>
<body>     
       <section id="form"><!--form-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4 col-sm-offset-1">
                        <div class="login-form"><!--login form-->
                            <h2>Login to your account</h2>
                            <form method="POST" action="{{url('login')}}">
                                {!! csrf_field() !!}
                                <input type="text" name="first_name" id="first_name" placeholder="First Name" /><br>
                                <input type="text" name="last_name" id="last_name" placeholder="Last Name" /><br>
                                <input type="email" name="email" id="email" placeholder="Email Address" /><br>
                                <input type="password" name="password" id="password" placeholder="Password" /><br>
                                <span>
                                    <input name="remember" id="remember" type="checkbox" class="checkbox"> 
                                    Keep me signed in
                                </span>
                                <button type="submit" class="btn btn-default">Login</button>
                            </form>
                        </div><!--/login form-->
                    </div>
                    <!-- <div class="col-sm-1">
                        <h2 class="or">OR</h2>
                    </div>
                    <div class="col-sm-4">
                        <div class="signup-form">
                            <h2>New User Signup!</h2>
                            <form method="POST" action="{{url('register')}}">
                                {!! csrf_field() !!}
                                <input type="text" name="name" id="name"  placeholder="Name">
                                <input type="email" name="email" placeholder="Email Address"/>
                                <input type="password" name="password" placeholder="Password">
                                <button type="submit" class="btn btn-default">Signup</button>
                            </form>
                        </div>
                    </div> -->
                </div>
            </div>
        </section><!--/form-->
</body>
</head>
</html>


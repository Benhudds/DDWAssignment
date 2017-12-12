<!doctype html>
<head>
</head>
<body>
	{!!Form::open(array('url'=>'users/addnew','method'=>'post'))!!}
    <input type="text" name="username" placeholder="username"><br></br>
    <input type="text" name="email" placeholder="email"><br></br>
    <input type="password" name="password" placeholder="password"><br></br>
    <input type="submit" value="register">
    {!!Form::close()!!}
</body>
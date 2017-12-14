<nav class="navbar navbar-inverse">
    <div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/">{{ config('app.name', 'CarBay')}}</a>
        </div>
        <div class="collapse navbar-collapse" id="navbar">
            <ul class="nav navbar-nav">
                <li><a href="/">Home</a></li>
                <li><a href="/posts">For Sale</a></li>
                @if(Session::has('user'))
                    <li><a href="/myposts">My Listings</a></li>
                    @if (Session::get('user')->access_level == 2)
                        <li><a href="/users">Users</a></li>
                    @endif
                @endif
            </ul>
            <ul class="nav navbar-nav navbar-right">
                <?php use App\Http\Controllers\LoginController;?>
                @if(!Session::has('user'))
                    <li><a href="/login">Login</a></li>
                    <li><a href="/register">Register</a></li>
                @else
                    <li><a href="/users/<?php echo Session::get('user')->id;?>">Profile</a></li>
                    <li><a href="/logout">Logout</a></li>
                @endif
            </ul>
        </div>
  </div>
</nav>
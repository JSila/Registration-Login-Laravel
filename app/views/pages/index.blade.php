<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Index page</title>
</head>
<body>

@if(Session::has('flash_message'))
    <p style="color:red;">{{ Session::get('flash_message') }}</p>
@endif

@if(Auth::check())
    <p>Hello there, {{ Auth::user()->username }}</p>
@else
    <p>You are not logged in!</p>
@endif

<ul>
    <li><a href="/register">Register</a></li>
    <li><a href="/login">Login</a></li>
    <li><a href="/logout">Logout</a></li>
</ul>

</body>
</html>

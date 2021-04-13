<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
<ul>
    <li><a href="{{ route('home') }}">Home</a></li>
    <li><a href="About">About</a></li>
    
    <li><a href="pass/{id}/{name?}">blog</a></li>
    <li><a href="posts/create">blog</a></li>
</ul>


@yield('content')
    
</body>
</html>
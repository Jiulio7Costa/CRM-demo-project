<!DOCTYPE html>
<html>
<head>
    <title>Laravel Demo</title>
</head>
<body>
    <header>
        <nav>
            <a href="{{ url('/') }}">Home</a>
            <a href="{{ url('/posts') }}">Posts</a>
        </nav>
    </header>
    <main>
        @yield('content')
    </main>
</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Profile</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>
<body>
    <div class="profile">
        <img src="{{ URL::to('/media/student/' . Auth::guard('student') -> user()->photo) }}" alt="{{ Auth::guard('student')->user()->name }}">
        <h1>{{ Auth::guard('student')->user()->name }}</h1>
        <p>{{ Auth::guard('student')->user()->email }}</p>
        <p>{{ Auth::guard('student')->user()->cell }}</p>
        <p>{{ Auth::guard('student')->user()->skill }}</p>
        <p>{{ Auth::guard('student')->user()->location }}</p>
        <a href="{{ route('student.logout') }}">Logout</a>
    </div>
</body>
</html>
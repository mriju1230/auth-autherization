<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Account Profile</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>
<body>
    <h1>Account Management</h1>
    <div class="profile">
        <img src="{{ URL::to('/media/staff/' . Auth::guard('staff') -> user()->photo) }}" alt="{{ Auth::guard('staff')->user()->name }}">
        <h1>{{ Auth::guard('staff')->user()->name }}</h1>
        <p>{{ Auth::guard('staff')->user()->email }}</p>
        <p>{{ Auth::guard('staff')->user()->cell }}</p>
        <p>{{ Auth::guard('staff')->user()->role }}</p>
        <a href="{{ route('staff.logout') }}">Logout</a>
    </div>
</body>
</html>
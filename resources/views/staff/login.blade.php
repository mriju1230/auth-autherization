<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">

</head>
<body>
    <div class="auth">
        <h2>Staff Login</h2>
        <hr>
        @if ($errors ->any())
            <p class="error">{{ $errors->first() }}</p>
        @endif
        <form action="{{ route('staff.login') }}" method="post">
            @csrf
            <input type="text" placeholder="Email/Username/Cell" name="auth">
            <input type="password" placeholder="Password" name="password">
            <input type="submit" value="Log In">
        </form>
        <a href="{{ URL::to('/staff-register') }}">Registration</a>
    </div>
</body>
</html>
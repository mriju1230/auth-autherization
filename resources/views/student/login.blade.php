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
        <h2>Student Login</h2>
        <hr>
        @if ($errors ->any())
            <p class="error">{{ $errors->first() }}</p>
        @endif
        <form action="{{ route('student.login') }}" method="post">
            @csrf
            <input type="email" placeholder="Email" name="email">
            <input type="password" placeholder="Password" name="password">
            <input type="submit" value="Log In">
        </form>
    </div>
</body>
</html>
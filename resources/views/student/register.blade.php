<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registration</title>
    <link rel="stylesheet" href="{{ asset('css/main.css') }}">
</head>
<body>
    <div class="auth">
        <h2>Student Create</h2>
        <hr>
        @if ($errors ->any())
            <p class="error">{{ $errors->first() }}</p>
        @endif

        @if (Session::has('success'))
            <p class="success">{{ Session::get('success') }}</p>            
        @endif
        <form action="{{ route('student.register') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="text" placeholder="Name" name="name">
            <input type="email" placeholder="Email" name="email">
            <input type="text" placeholder="Cell" name="cell">
            <input type="text" placeholder="Skill" name="skill">
            <input type="text" placeholder="Location" name="location">
            <input type="password" placeholder="Password" name="password">
            <input type="password" placeholder="Confirm Password" name="password_confirmation">
            <input type="file" name="photo">
            <input type="submit" value="Register">
        </form>
    </div>
</body>
</html>
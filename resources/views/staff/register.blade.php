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
        <h2>Staff Create</h2>
        <hr>
        @if ($errors ->any())
            <p class="error">{{ $errors->first() }}</p>
        @endif

        @if (Session::has('success'))
            <p class="success">{{ Session::get('success') }}</p>            
        @endif
        <form action="{{ route('staff.register') }}" method="post" enctype="multipart/form-data">
            @csrf
            <input type="text" placeholder="Name" name="name">
            <input type="text" placeholder="Username" name="username">
            <input type="email" placeholder="Email" name="email">
            <input type="text" placeholder="Cell" name="cell">
            <select name="role" id="">
                <option value="">Choose Role</option>
                <option value="Manager">Manager</option>
                <option value="Account">Account</option>
                <option value="Faculty">Faculty</option>
                <option value="Librariyan">Librariyan</option>
            </select>
            <input type="password" placeholder="Password" name="password">
            <input type="password" placeholder="Confirm Password" name="password_confirmation">
            <input type="file" name="photo">
            <input type="submit" value="Register">
        </form>
        <a href="{{ URL::to('/staff-login') }}">Login</a>
    </div>
</body>
</html>
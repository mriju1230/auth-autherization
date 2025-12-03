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
    <div class="profile otp">
        <h2>Verify OTP</h2>
        <hr>
        @if ($errors ->any())
            <p class="error">{{ $errors->first() }}</p>
        @endif
        @if (Session::has('success'))
            <p class="success">{{ Session::get('success') }}</p>            
        @endif
        @if (Session::has('error'))
            <p class="error">{{ Session::get('error') }}</p>            
        @endif
        <form action="{{ route('staff.otp') }}" method="post">
            @csrf
            <input type="text" name="otp">
            <input type="submit" value="Active Now">
        </form>
    </div>
</body>
</html>
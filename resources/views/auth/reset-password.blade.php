<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form method="POST" action="{{route('password.update')}}">
    @csrf
    <input type="hidden" name="token" value="{{ request()->token }}">
    <input type="email" name="email">
    @error('email')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
    <input type="password" name="password">
    @error('password')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
    <input type="password" name="password_confirmation">
    @error('password_confirmation')
    <div class="alert alert-danger">{{ $message }}</div>
@enderror
    <button type="submit">reset</button>
</form>
</body>
</html>
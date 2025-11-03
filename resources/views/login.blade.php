<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Back - Login</title>
    <link href="{{ asset('css/login.css') }}" rel="stylesheet">
</head>
<body>

<div class="login-container">
    <div class="image-side"></div>

    <!-- Form -->
    <div class="form-side">
        <h2>Welcome Back</h2>
        
        <form method="POST" action="{{ route('login') }}">
            @csrf 
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" id="username" name="username" placeholder="Enter your username" required autofocus>
                {{-- error message Laravel: @error('username') <span class="text-danger">{{ $message }}</span> @enderror --}}
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" id="password" name="password" placeholder="Enter your password" required>
                {{--  error message Laravel: @error('password') <span class="text-danger">{{ $message }}</span> @enderror --}}
            </div>
            <div class="lupa-password">
                <a href="">Lupa Password?</a>
            </div>
            <button type="submit" class="btn-login">
                Login
            </button>
        </form>
    </div>
</div>

</body>
</html>
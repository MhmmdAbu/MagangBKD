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
        <h2>Selamat Datang</h2>
        
        <form method="POST" action="{{ route('login.proses') }}">
            @csrf 
            <div class="form-group">
                <label for="email">Email</label>
                <input type="text" id="username" name="email" placeholder="Enter your email" required autofocus>
                {{-- error message Laravel: @error('email') <span class="text-danger">{{ $message }}</span> @enderror --}}
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
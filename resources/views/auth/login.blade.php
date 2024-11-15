<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #2F3E4D;
            color: #ffffff;
            font-family: Arial, sans-serif;
        }
        .login-container {
            max-width: 400px;
            margin: auto;
            padding: 2rem;
            background-color: #fff;
            color: #333;
            border-radius: 8px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            margin-top: 10%;
        }
        .login-container h2 {
            color: #56B4EF;
            font-weight: bold;
            text-align: center;
            margin-bottom: 2rem;
        }
        .login-container label {
            color: #666;
        }
        .login-container .btn-login {
            background-color: #56B4EF;
            border: none;
            width: 100%;
            color: #fff;
            padding: 0.5rem;
            font-weight: bold;
            margin-top: 1rem;
        }
        .login-container .btn-login:hover {
            background-color: #4aa1d8;
        }
        .login-container .forgot-password {
            text-align: right;
        }
        .footer-text {
            color: #ccc;
            text-align: center;
            margin-top: 1rem;
            font-size: 0.9rem;
        }
        .logo {
            display: block;
            margin: 0 auto 1rem;
            max-width: 150px;
        }
    </style>
</head>
<body>

    <div class="login-container">
        <img src="{{ asset('images/logo.png') }}" alt="Logo" class="logo">
        <h2>Log In</h2>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="form-group">
                <label for="username">Username</label>
                <input type="text" name="email" id="username" class="form-control" placeholder="Username" required autofocus>
            </div>
            <div class="form-group">
                <label for="password">Password</label>
                <input type="password" name="password" id="password" class="form-control" placeholder="Password" required>
            </div>
            <div class="form-group form-check">
                <input type="checkbox" name="remember" id="remember" class="form-check-input">
                <label for="remember" class="form-check-label">Remember</label>
                <a href="{{ route('password.request') }}" class="float-right forgot-password">Forgot Password?</a>
            </div>
            <button type="submit" class="btn btn-login">LOGIN</button>
        </form>
    </div>

    <div class="footer-text">
        © 2024 HR-NIA. All rights reserved.
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>
</body>
</html>

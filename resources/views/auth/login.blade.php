<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Apotek - Penjualan Obat FEFO</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('pharmacy.png') }}" />
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <style>
        * {
            box-sizing: border-box;
        }

        body {
            background: #e0e5ec;
            font-family: 'Nunito', sans-serif;
            height: 100vh;
            margin: 0;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        .login-card {
            background: #e0e5ec;
            border-radius: 20px;
            box-shadow: 20px 20px 60px #bebebe,
                -20px -20px 60px #ffffff;
            padding: 40px;
            width: 100%;
            max-width: 400px;
            text-align: center;
        }

        .login-card img.logo {
            width: 80px;
            margin-bottom: 20px;
        }

        .login-card h1 {
            font-weight: 700;
            font-size: 28px;
            margin-bottom: 10px;
            color: #333;
        }

        .login-card p {
            color: #777;
            margin-bottom: 30px;
        }

        .input-group-custom {
            display: flex;
            align-items: center;
            background: #e0e5ec;
            border-radius: 12px;
            padding: 12px 16px;
            margin-bottom: 20px;
            box-shadow: inset 5px 5px 10px #c8c9cc,
                inset -5px -5px 10px #ffffff;
        }

        .input-group-custom .icon {
            margin-right: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
        }

        .input-group-custom .icon svg {
            width: 20px;
            height: 20px;
            color: #666;
        }

        .input-group-custom input {
            background: none;
            border: none;
            outline: none;
            color: #333;
            font-size: 14px;
            width: 100%;
        }

        .input-group-custom input::placeholder {
            color: #aaa;
        }

        .btn-login {
            width: 100%;
            padding: 12px;
            background: #e0e5ec;
            border: none;
            border-radius: 12px;
            font-weight: bold;
            color: #333;
            box-shadow: 5px 5px 15px #bebebe,
                -5px -5px 15px #ffffff;
            transition: all 0.3s ease;
        }

        .btn-login:hover {
            background: #d1d9e6;
        }

        .invalid-feedback {
            font-size: 13px;
            color: #e74c3c;
            text-align: left;
            margin-top: -15px;
            margin-bottom: 10px;
        }
    </style>
</head>

<body>

    <div class="login-card">
        <img src="{{ asset('pharmacy.png') }}" alt="Logo" class="logo">
        <h1>Sign In</h1>

        <form method="POST" action="{{ route('login') }}">
            @csrf
            <div class="input-group-custom">
                <div class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-user"
                        viewBox="0 0 24 24">
                        <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                        <circle cx="12" cy="7" r="4"></circle>
                    </svg>
                </div>
                <input id="email" type="email" name="email" placeholder="Email"
                    class="@error('email') is-invalid @enderror" required autocomplete="email" autofocus>
            </div>
            @error('email')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

            <div class="input-group-custom">
                <div class="icon">
                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" stroke="currentColor" stroke-width="2"
                        stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock"
                        viewBox="0 0 24 24">
                        <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                        <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                    </svg>
                </div>
                <input id="password" type="password" name="password" placeholder="Password"
                    class="@error('password') is-invalid @enderror" required autocomplete="current-password">
            </div>
            @error('password')
                <div class="invalid-feedback">
                    {{ $message }}
                </div>
            @enderror

            <button type="submit" class="btn-login">Login</button>
        </form>
    </div>

</body>

</html>

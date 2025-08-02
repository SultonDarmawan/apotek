<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | Apotek - Penjualan Obat FEFO</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('pharmacy.png') }}" />
    <link href="https://fonts.googleapis.com/css?family=Nunito:400,600,700" rel="stylesheet">
    <link href="{{ asset('bootstrap/css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" />

    <style>
        body {
            background: linear-gradient(to right, #3f5efb, #fc466b);
            font-family: 'Nunito', sans-serif;
            height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0;
        }

        .form-form-wrap {
            background: rgba(255, 255, 255, 0.1);
            border-radius: 20px;
            box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
            backdrop-filter: blur(10px);
            -webkit-backdrop-filter: blur(10px);
            border: 1px solid rgba(255, 255, 255, 0.18);
            padding: 40px;
            width: 100%;
            max-width: 400px;
        }

        .form-content {
            text-align: center;
        }

        .form-content img {
            width: 80px;
            margin-bottom: 20px;
        }

        .form-content h1 {
            font-size: 32px;
            font-weight: bold;
            color: #ffffff;
            margin-bottom: 10px;
        }

        .form-content p {
            color: #e0e0e0;
            margin-bottom: 30px;
        }

        .form-control {
            background-color: rgba(255, 255, 255, 0.2);
            border: none;
            color: #fff;
            border-radius: 10px;
            padding: 12px 15px;
        }

        .form-control::placeholder {
            color: #d1d5db;
        }

        .form-control:focus {
            background-color: rgba(255, 255, 255, 0.3);
            color: #fff;
            box-shadow: none;
        }

        .field-wrapper.input {
            position: relative;
            margin-bottom: 25px;
        }

        .field-wrapper svg {
            position: absolute;
            top: 50%;
            left: 15px;
            transform: translateY(-50%);
            color: #ccc;
        }

        .field-wrapper.input input {
            padding-left: 45px;
        }

        label {
            color: #fff;
            font-weight: 500;
            float: left;
        }

        .btn-primary {
            width: 100%;
            padding: 12px;
            background: #10b981;
            border: none;
            border-radius: 10px;
            font-weight: bold;
            transition: background 0.3s ease;
        }

        .btn-primary:hover {
            background: #059669;
        }

        .invalid-feedback {
            font-size: 13px;
            color: #f87171;
        }

        .feather-eye {
            cursor: pointer;
            right: 15px;
            left: auto;
        }

        #toggle-password {
            position: absolute;
            top: 50%;
            right: 15px;
            transform: translateY(-50%);
        }

        .modal-content {
            border-radius: 15px;
        }

        .modal-header h5 {
            font-weight: 600;
        }

        .modal-footer .btn-primary {
            background-color: #6366f1;
            border: none;
        }
    </style>
</head>

<body>
    <div class="form-form-wrap">
        <div class="form-content">
            <img src="{{ asset('pharmacy.png') }}" alt="Logo">
            <h1>Sign In</h1>
            <p>Log in to your account to continue.</p>

            <form method="POST" action="{{ route('login') }}" class="text-left">
                @csrf

                <div class="form">
                    <div id="username-field" class="field-wrapper input">
                        <label for="email">Email</label>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-user">
                            <path d="M20 21v-2a4 4 0 0 0-4-4H8a4 4 0 0 0-4 4v2"></path>
                            <circle cx="12" cy="7" r="4"></circle>
                        </svg>
                        <input id="email" type="email" placeholder="Email"
                            class="form-control @error('email') is-invalid @enderror" name="email"
                            required autocomplete="email" autofocus>
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div id="password-field" class="field-wrapper input">
                        <label for="password">Password</label>
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-lock">
                            <rect x="3" y="11" width="18" height="11" rx="2" ry="2"></rect>
                            <path d="M7 11V7a5 5 0 0 1 10 0v4"></path>
                        </svg>
                        <input id="password" type="password" placeholder="Password"
                            class="form-control @error('password') is-invalid @enderror" name="password"
                            required autocomplete="current-password">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round"
                            id="toggle-password" class="feather feather-eye">
                            <path d="M1 12s4-8 11-8 11 8 11 8-4 8-11 8-11-8-11-8z"></path>
                            <circle cx="12" cy="12" r="3"></circle>
                        </svg>
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <div class="field-wrapper">
                        <button type="submit" class="btn btn-primary">Login</button>
                    </div>
                </div>
            </form>
        </div>
    </div>

    <!-- Optional: Forgot Password Modal -->
    <div class="modal fade" id="forgotPassword" tabindex="-1" role="dialog" aria-labelledby="forgotPasswordTitle"
        aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="forgotPasswordTitle">Forgot Password?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24"
                            fill="none" stroke="currentColor" stroke-width="2"
                            stroke-linecap="round" stroke-linejoin="round" class="feather feather-x">
                            <line x1="18" y1="6" x2="6" y2="18"></line>
                            <line x1="6" y1="6" x2="18" y2="18"></line>
                        </svg>
                    </button>
                </div>
                <div class="modal-body">
                    <p class="modal-text">Relax and try to remember your password.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-primary" data-dismiss="modal">Arigatou!</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="{{ asset('assets/js/libs/jquery-3.1.1.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/popper.min.js') }}"></script>
    <script src="{{ asset('bootstrap/js/bootstrap.min.js') }}"></script>

    <!-- Toggle Password Visibility -->
    <script>
        document.getElementById("toggle-password").addEventListener("click", function () {
            const password = document.getElementById("password");
            const type = password.getAttribute("type") === "password" ? "text" : "password";
            password.setAttribute("type", type);
            this.classList.toggle("feather-eye-off");
        });
    </script>
</body>

</html>

<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ __('Login') }} | {{ __('Climate Catalyst Prize') }}</title>
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Manrope:wght@400;500;600;700&family=Plus+Jakarta+Sans:wght@500;600;700;800&display=swap" rel="stylesheet">
    @if (file_exists(public_path('build/manifest.json')) || file_exists(public_path('hot')))
        @vite(['resources/css/app.css', 'resources/js/app.js'])
    @endif
    <style>
        * { box-sizing: border-box; }
        body {
            margin: 0;
            font-family: 'Manrope', sans-serif;
            background: #F5F1E8;
            color: #1C2B24;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 2rem;
        }
        .login-container {
            width: 100%;
            max-width: 420px;
        }
        .login-header {
            text-align: center;
            margin-bottom: 2rem;
        }
        .login-logo {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-weight: 700;
            font-size: 1.25rem;
            color: #1C2B24;
            text-decoration: none;
        }
        .login-logo span { color: #087F5B; }
        .login-title {
            font-family: 'Plus Jakarta Sans', sans-serif;
            font-size: 1.75rem;
            font-weight: 700;
            margin: 1.5rem 0 0.5rem;
            color: #1C2B24;
        }
        .login-subtitle {
            color: #5B6F66;
            font-size: 0.9rem;
            margin: 0;
        }
        .login-card {
            background: #FFFFFF;
            border: 1px solid #E2E8E2;
            border-radius: 20px;
            padding: 2rem;
            box-shadow: 0 2px 8px rgba(28, 43, 36, 0.04);
        }
        .form-group {
            margin-bottom: 1.25rem;
        }
        .form-label {
            display: block;
            margin-bottom: 0.4rem;
            font-weight: 600;
            font-size: 0.85rem;
            color: #1C2B24;
        }
        .form-control {
            width: 100%;
            padding: 0.65rem 0.9rem;
            border: 1px solid #E2E8E2;
            border-radius: 10px;
            font-family: 'Manrope', sans-serif;
            font-size: 0.9rem;
            background: #fff;
            transition: all 0.2s;
        }
        .form-control:focus {
            outline: none;
            border-color: #087F5B;
            box-shadow: 0 0 0 3px rgba(8, 127, 91, 0.1);
        }
        .form-error {
            color: #DC2626;
            font-size: 0.8rem;
            margin-top: 0.35rem;
        }
        .btn {
            display: inline-flex;
            align-items: center;
            justify-content: center;
            gap: 0.5rem;
            padding: 0.85rem 2rem;
            border-radius: 9999px;
            font-family: 'Manrope', sans-serif;
            font-size: 0.9rem;
            font-weight: 600;
            text-decoration: none;
            transition: all 0.25s ease;
            cursor: pointer;
            border: none;
        }
        .btn-primary {
            background: #087F5B;
            color: #FFFFFF;
            box-shadow: 0 4px 16px rgba(8, 127, 91, 0.2);
            width: 100%;
        }
        .btn-primary:hover {
            background: #06694B;
            transform: translateY(-2px);
            box-shadow: 0 8px 24px rgba(8, 127, 91, 0.25);
        }
    </style>
</head>
<body>
    <div class="login-container">
        <div class="login-header">
            <a href="{{ url('/') }}" class="login-logo">
                Climate <span>Catalyst</span>
            </a>
            <h1 class="login-title">{{ __('Log in to admin') }}</h1>
            <p class="login-subtitle">{{ __('Access the Climate Catalyst Prize admin panel') }}</p>
        </div>

        <div class="login-card">
            <form method="POST" action="{{ route('login.submit') }}">
                @csrf
                <div class="form-group">
                    <label for="email" class="form-label">{{ __('Email') }}</label>
                    <input type="email" id="email" name="email" class="form-control" required autofocus>
                    @error('email')<div class="form-error">{{ $message }}</div>@enderror
                </div>

                <div class="form-group">
                    <label for="password" class="form-label">{{ __('Password') }}</label>
                    <input type="password" id="password" name="password" class="form-control" required>
                    @error('password')<div class="form-error">{{ $message }}</div>@enderror
                </div>

                <button type="submit" class="btn btn-primary">
                    {{ __('Log in') }}
                </button>
            </form>
        </div>
    </div>
</body>
</html>

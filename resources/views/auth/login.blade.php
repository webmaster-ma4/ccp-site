<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>{{ __('Admin Login | Climate Catalyst Prize') }}</title>
    
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Cormorant+Garamond:wght@700&family=Inter:wght@400;500;600;700&display=swap" rel="stylesheet">
    
    @vite(['resources/css/app.css'])
</head>
<body style="margin: 0; padding: 0; background: #F6F8FA;">

<div class="auth-wrap">
    {{-- Left Visual Panel --}}
    <div class="auth-visual">
        <div class="auth-visual-bg">
            <img src="{{ asset('images/about-img.jpg') }}" alt="CCP Background">
        </div>
        <div class="auth-visual-overlay"></div>
        <div class="auth-visual-content">
            <div class="auth-visual-line"></div>
            <h2>{{ __('Driving Impact,<br>Delivering Change.') }}</h2>
            <p>{{ __('Secure access portal for Climate Catalyst Prize administrators and technical staff. Authorized personnel only.') }}</p>
        </div>
    </div>
    
    {{-- Right Form Panel --}}
    <div class="auth-form-panel">
        <div class="auth-form-inner">
            
            <div class="auth-logo-area">
                <a href="{{ url('/') }}">
                    <img src="{{ asset('images/logo-ccp.svg') }}" alt="CCP Logo">
                </a>
            </div>
            
            <h1 class="auth-form-title">{{ __('Admin Portal') }}</h1>
            <p class="auth-form-sub">{{ __('Please sign in to access your dashboard') }}</p>
            
            @if(session('error'))
                <div style="background: #FEE2E2; color: #DC2626; padding: 0.75rem 1rem; border-radius: 6px; font-family: 'Inter', sans-serif; font-size: 0.85rem; margin-bottom: 1.5rem; border: 1px solid #F87171;">
                    {{ session('error') }}
                </div>
            @endif

            <form action="{{ route('login.submit') }}" method="POST">
                @csrf
                
                <div class="form-group">
                    <label class="form-label" for="email">{{ __('Email Address') }}</label>
                    <div class="auth-input-wrap">
                        <div class="auth-input-icon">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 12a4 4 0 10-8 0 4 4 0 008 0zm0 0v1.5a2.5 2.5 0 005 0V12a9 9 0 10-9 9m4.5-1.206a8.959 8.959 0 01-4.5 1.207" /></svg>
                        </div>
                        <input type="email" id="email" name="email" class="auth-input" value="{{ old('email') }}" required autofocus>
                    </div>
                    @error('email')
                        <div style="color: #DC2626; font-size: 0.75rem; margin-top: 0.4rem;">{{ $message }}</div>
                    @enderror
                </div>
                
                <div class="form-group" style="margin-bottom: 2rem;">
                    <div style="display: flex; justify-content: space-between; align-items: center; margin-bottom: 0.5rem;">
                        <label class="form-label" for="password" style="margin-bottom: 0;">{{ __('Password') }}</label>
                        <a href="#" style="font-family: 'Inter', sans-serif; font-size: 0.75rem; color: #C8A04D; text-decoration: none; font-weight: 600;">{{ __('Forgot?') }}</a>
                    </div>
                    <div class="auth-input-wrap">
                        <div class="auth-input-icon">
                            <svg fill="none" stroke="currentColor" viewBox="0 0 24 24"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 15v2m-6 4h12a2 2 0 002-2v-6a2 2 0 00-2-2H6a2 2 0 00-2 2v6a2 2 0 002 2zm10-10V7a4 4 0 00-8 0v4h8z" /></svg>
                        </div>
                        <input type="password" id="password" name="password" class="auth-input" required>
                    </div>
                </div>
                
                <div style="display: flex; align-items: center; margin-bottom: 2rem;">
                    <input type="checkbox" id="remember" name="remember" style="margin-right: 0.5rem; accent-color: #081C3A;">
                    <label for="remember" style="font-family: 'Inter', sans-serif; font-size: 0.85rem; color: #5E7590;">{{ __('Remember me on this device') }}</label>
                </div>
                
                <button type="submit" class="btn btn-navy w-full" style="width: 100%; justify-content: center; padding-top: 1rem; padding-bottom: 1rem;">
                    {{ __('Sign In') }}
                </button>
            </form>
            
            <div style="margin-top: 3rem; text-align: center; font-family: 'Inter', sans-serif; font-size: 0.75rem; color: #8FA0B4;">
                &copy; {{ date('Y') }} Climate Catalyst Prize.<br>
                <a href="{{ route('home') }}" style="color: #C8A04D; text-decoration: none; font-weight: 600;">{{ __('Return to public site') }}</a>
            </div>
            
        </div>
    </div>
</div>

</body>
</html>

<!DOCTYPE html>
<html lang="en" lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- CSS files -->
    <link href="{{ asset('admin/assets/dist/css/tabler.min.css?1692870487') }}" rel="stylesheet" />
    <link href="{{ asset('admin/assets/dist/css/tabler-flags.min.css?1692870487') }}" rel="stylesheet" />
    <link href="{{ asset('admin/assets/dist/css/tabler-payments.min.css?1692870487') }}" rel="stylesheet" />
    <link href="{{ asset('admin/assets/dist/css/tabler-vendors.min.css?1692870487') }}" rel="stylesheet" />
    <link href="{{ asset('admin/assets/dist/css/demo.min.css?1692870487') }}" rel="stylesheet" />

    <style>
        @import url('https://rsms.me/inter/inter.css');

        :root {
            --tblr-font-sans-serif: 'Inter Var', -apple-system, BlinkMacSystemFont, San Francisco, Segoe UI, Roboto, Helvetica Neue, sans-serif;
        }

        body {
            font-feature-settings: "cv03", "cv04", "cv11";
        }
    </style>
</head>

<body class=" d-flex flex-column">
    <script src="{{ asset('admin/assets/dist/js/demo-theme.min.js?1692870487') }}"></script>
    <div class="page page-center">
        <div class="container py-4 container-tight">
            <div class="mb-4 text-center">
                <x-application-logo />
            </div>
            <x-auth-session-status class="mb-4" :status="session('status')" />
            <div class="card card-md">
                <div class="card-body">
                    <h2 class="mb-4 text-center h2">Login to your account</h2>
                    <form action="{{ route('admin.login.store') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input id="email" name="email" required autofocus autocomplete="username"
                                type="email" class="form-control" value="{{ old('email') }}"
                                placeholder="your@email.com" autocomplete="off" required>
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <div class="mb-2">
                            <label for="password" class="form-label">
                                Password
                                {{-- <span class="form-label-description">
                                    @if (Route::has('admin.password.request'))
                                        <a href="{{ route('admin.password.request') }}">I forgot password</a>
                                    @endif
                                </span> --}}
                            </label>
                            <div class="input-group input-group-flat">
                                <input type="password" name="password" required autocomplete="current-password"
                                    class="form-control" placeholder="Your password" autocomplete="off">
                                <x-input-error :messages="$errors->get('password')" class="mt-2" />
                                <span class="input-group-text">
                                    <a id="show_password" href="#" class="link-secondary" title="Show password"
                                        data-bs-toggle="tooltip"><!-- Download SVG icon from http://tabler-icons.io/i/eye -->
                                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24"
                                            height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor"
                                            fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M10 12a2 2 0 1 0 4 0a2 2 0 0 0 -4 0" />
                                            <path
                                                d="M21 12c-2.4 4 -5.4 6 -9 6c-3.6 0 -6.6 -2 -9 -6c2.4 -4 5.4 -6 9 -6c3.6 0 6.6 2 9 6" />
                                        </svg>
                                    </a>
                                </span>

                                <script>
                                    document.querySelector('#show_password').addEventListener('click', function(e) {
                                        e.preventDefault();
                                        const passwordField = document.querySelector('input[name="password"]');
                                        const type = passwordField.getAttribute('type') === 'password' ? 'text' : 'password';
                                        passwordField.setAttribute('type', type);
                                        this.querySelector('svg').setAttribute('stroke', type === 'text' ? '#000' : '#ccc');
                                    });
                                </script>
                            </div>
                        </div>
                        <div class="mb-2">
                            <div class="d-flex justify-content-between">
                                <label class="form-check">
                                    <input id="remember_me" type="checkbox" class="form-check-input" />
                                    <span class="form-check-label">Remember me</span>
                                </label>
                                <span class="form-label-description">
                                    @if (Route::has('admin.password.request'))
                                        <a href="{{ route('admin.password.request') }}">I forgot password</a>
                                    @endif
                                </span>
                            </div>
                        </div>
                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary w-100">Sign in with Email</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="mt-3 text-center text-secondary">
                Forget your password? <a href="{{ route('admin.password.request') }}" tabindex="-1">Here</a>
            </div>
        </div>
    </div>
    <script src="{{ asset('admin/assets/dist/js/tabler.min.js?1692870487') }}" defer></script>
    <script src="{{ asset('admin/assets/dist/js/demo.min.js?1692870487') }}" defer></script>
</body>

</html>

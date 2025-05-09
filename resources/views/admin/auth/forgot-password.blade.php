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
                    <span class="text-muted">Forgot your password? No problem. Just let us know your email
                        address and we will email you a
                        password reset link that will allow you to choose a new one.</span>
                    <br />
                    <br />

                    <form action="{{ route('admin.password.email') }}" method="POST">
                        @csrf

                        <div class="mb-3">
                            <label for="email" class="form-label">Email address</label>
                            <input id="email" name="email" type="email" class="form-control"
                                value="{{ old('email') }}" placeholder="your@email.com" autofocus required>
                            <x-input-error :messages="$errors->get('email')" class="mt-2" />
                        </div>

                        <div class="form-footer">
                            <button type="submit" class="btn btn-primary w-100">Email Password Reset
                                Link</button>
                        </div>
                    </form>
                </div>
            </div>
            <div class="mt-3 text-center text-secondary">
                Back to sign in? <a href="{{ route('admin.login') }}" tabindex="-1">Here</a>
            </div>
        </div>
    </div>
    <script src="{{ asset('admin/assets/dist/js/tabler.min.js?1692870487') }}" defer></script>
    <script src="{{ asset('admin/assets/dist/js/demo.min.js?1692870487') }}" defer></script>
</body>

</html>

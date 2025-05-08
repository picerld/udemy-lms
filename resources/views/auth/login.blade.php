<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <h1 class="my-5 text-3xl font-bold text-center dark:text-white">Welcome Back 👀</h1>

    <form method="POST" action="{{ route('login') }}">
        @csrf

        <!-- Email Address -->
        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block w-full mt-1" type="email" name="email" :value="old('email')" required
                autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block w-full mt-1" type="password" name="password" required
                autocomplete="current-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="text-indigo-600 border-gray-300 rounded shadow-sm dark:bg-gray-900 dark:border-gray-700 focus:ring-indigo-500 dark:focus:ring-indigo-600 dark:focus:ring-offset-gray-800"
                    name="remember">
                <span class="text-sm text-gray-600 ms-2 dark:text-gray-400">{{ __('Remember me') }}</span>
            </label>
        </div>

        <div class="flex flex-col gap-3 py-3">
            <x-primary-button class="flex justify-center w-full py-3">
                {{ __('Sign In With Email') }}
            </x-primary-button>
        </div>

        <div class="flex items-center justify-center mt-4">
            <div class="flex flex-col items-center">
                @if (Route::has('register'))
                    <div class="flex items-center gap-1">
                        <span class="text-sm text-gray-600 dark:text-gray-400">
                            {{ __('New to our platform?') }}
                        </span>
                        <a class="text-sm text-gray-600 underline rounded-md dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                            href="{{ route('register') }}">
                            {{ __('Register') }}
                        </a>
                    </div>
                @endif

                @if (Route::has('password.request'))
                    <div class="flex items-center gap-1">
                        <span class="text-sm text-gray-600 dark:text-gray-400">
                            {{ __('Forgot your password?') }}
                        </span>
                        <a class="text-sm text-gray-600 underline rounded-md dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                            href="{{ route('password.request') }}">
                            {{ __('Reset Password') }}
                        </a>
                    </div>
                @endif

                <div class="flex items-center gap-1">
                    <span class="text-sm text-gray-600 dark:text-gray-400">
                        {{ __('Your an admin?') }}
                    </span>
                    <a class="text-sm text-gray-600 underline rounded-md dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800"
                        href="{{ route('admin.login') }}">
                        {{ __('Here') }}
                    </a>
                </div>
            </div>

        </div>
    </form>
</x-guest-layout>

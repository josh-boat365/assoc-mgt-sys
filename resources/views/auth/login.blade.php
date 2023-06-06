<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />
    <form method="POST" action="{{ route('login') }}"> @csrf
        <!-- Username or Email Address -->
        <div>
            <x-input-label for="input_type" :value="__('Username or Email')" />
            <x-text-input id="input_type" class="block mt-1 w-full placeholder:text-gray-300" type="text"
                name="input_type" :value="old('input_type')" autofocus autocomplete="input_type"
                placeholder="Enter Username or email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
            <x-input-error :messages="$errors->get('username')" class="mt-2" />
        </div>
        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full placeholder:text-gray-300" type="password"
                name="password" autocomplete="current-password" placeholder="Enter password" />
            <x-input-error :messages=" $errors->get('password')" class="mt-2" />
        </div>
        <!-- Remember Me -->
        <div class="block mt-4">
            <label for="remember_me" class="inline-flex items-center">
                <input id="remember_me" type="checkbox"
                    class="rounded border-gray-300 text-indigo-600 shadow-sm focus:ring-indigo-500" name="remember">
                <span class="ml-2 text-sm text-gray-600">{{ __('Remember me') }}</span>
            </label>
        </div>
        <div clas s="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md hover:text-indigo-700"
                href="{{ route('register') }}"> Create account </a> @if(Route::has('password.request')) <a
                class="underline ml-[3rem] text-sm text-gray-600 hover:text-gray-900 rounded-md hover:text-indigo-700"
                href="{{ route('password.request') }}"> {{ __('Forgot your password?') }} </a> @endif <x-primary-button
                class="ml-3"> {{ __('Log in') }} </x-primary-button>
        </div>
    </form>
</x-guest-layout>

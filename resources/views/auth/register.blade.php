<x-guest-layout>
    <form method="POST" action="{{ route('register') }}"> @csrf
        <!-- Bar number -->
        <div>
            <x-input-label for="name" :value="__('Association Number')" />
            <x-text-input id="assoc_number" class="block mt-1 mb-2 w-full placeholder:text-gray-300" type="text" name="assoc_number" :value="old('assoc_number')" autofocus autocomplete="assoc_number" placeholder="Enter association number eg:(0000)" />
            <x-input-error :messages="$errors->get('assoc_number')" class="mt-2" />
        </div>
        <!-- Username -->
        <div>
            <x-input-label for="name" :value="__('Username')" />
            <x-text-input id="username" class="block mt-1 w-full placeholder:text-gray-300" type="text" name="username" :value="old('username')" autofocus autocomplete="username" placeholder="Enter Username eg: member123" />
            <x-input-error :messages="$errors->get('username')" class="mt-2" />
        </div>
        <!-- Email Address -->
        <div class="mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full placeholder:text-gray-300" type="email" name="email" :value="old('email')" autocomplete="email" placeholder="Enter email eg: member@ams.com" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>
        <!-- Password -->
        <div class="mt-4">
            <x-input-label for="password" :value="__('Password')" />
            <x-text-input id="password" class="block mt-1 w-full placeholder:text-gray-300" type="password" name="password" autocomplete="new-password" placeholder="Enter password" />
            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>
        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />
            <x-text-input id="password_confirmation" class="block mt-1 w-full placeholder:text-gray-300" type="password" name="password_confirmation" autocomplete="new-password" placeholder="Confirm password" />
            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>
        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md hover:text-indigo-700" href="{{ route('login') }}"> {{ __('Already registered?') }} </a>
            <x-primary-button class="ml-4"> {{ __('Register') }} </x-primary-button>
        </div>
    </form>
</x-guest-layout>

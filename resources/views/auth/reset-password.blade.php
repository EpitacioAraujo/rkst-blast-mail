<x-layouts.guest>
    <form method="POST" action="{{ route('password.store') }}">
        @csrf

        <!-- Password Reset Token -->
        <input type="hidden" name="token" value="{{ $request->route('token') }}">

        <!-- Email Address -->
        <div>
            <x-input.adornment.label for="email" :value="__('Email')" />
            <x-input.text id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email', $request->email)" required autofocus autocomplete="username" />
            <x-input.adornment.error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="mt-4">
            <x-input.adornment.label for="password" :value="__('Password')" />
            <x-input.text id="password" class="block mt-1 w-full" type="password" name="password" required autocomplete="new-password" />
            <x-input.adornment.error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="mt-4">
            <x-input.adornment.label for="password_confirmation" :value="__('Confirm Password')" />

            <x-input.text id="password_confirmation" class="block mt-1 w-full"
                                type="password"
                                name="password_confirmation" required autocomplete="new-password" />

            <x-input.adornment.error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <x-button.primary>
                {{ __('Reset Password') }}
            </x-button.primary>
        </div>
    </form>
</x-layouts.guest>

<x-guest-layout>
    <!-- Session Status -->
    <x-auth-session-status class="mb-4" :status="session('status')" />

    <div class="bg-white w-full max-w-md rounded-lg shadow-md overflow-hidden mx-auto">
        <!-- Your background image or illustration can go here -->

        <form method="POST" action="{{ route('login') }}" class="p-8">
            @csrf

            <!-- Email Address -->
            <div class="mb-4">
                <label for="email" class="block text-gray-700 font-bold mb-2">{{ __('Email') }}</label>
                <input id="email" class="form-input mt-1 block w-full" type="email" name="email" :value="old('email')" required autofocus autocomplete="username" />
                <x-input-error :messages="$errors->get('email')" class="mt-2" />
            </div>

            <!-- Password -->
            <div class="mb-4">
                <label for="password" class="block text-gray-700 font-bold mb-2">{{ __('Password') }}</label>
                <input id="password" class="form-input mt-1 block w-full"
                    type="password"
                    name="password"
                    required autocomplete="current-password" />
                <x-input-error :messages="$errors->get('password')" class="mt-2" />
            </div>



            <div class="flex items-center justify-between">
                <button type="submit" class="bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">{{ __('Log in') }}</button>
            </div>
        </form>
    </div>
</x-guest-layout>

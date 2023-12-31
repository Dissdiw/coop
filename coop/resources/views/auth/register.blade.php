<x-guest-layout>
    <form class="row g-3" method="POST" action="{{ route('register') }}">
        @csrf

        <div class="d-flex justify-content-center">
            <img width="150" src="{{asset('/logo/profile-user.png')}}">
        </div>

        <!-- Image -->
        <div>
            <x-text-input id="image" class="block mt-1 w-full" type="file" name="image" :value="old('image')" required autofocus autocomplete="image" />
            <x-input-error :messages="$errors->get('image')" class="mt-2" />
        </div>

        <!-- Firstname -->
        <div class="col-6 mt-4">
            <x-input-label for="firstname" :value="__('Firstname')" />
            <x-text-input id="firstname" class="block mt-1 w-full" type="text" name="firstname" :value="old('firstname')" required autofocus autocomplete="firstname" />
            <x-input-error :messages="$errors->get('firstname')" class="mt-2" />
        </div>

        <!-- Lastname -->
        <div class="col-6 mt-4">
            <x-input-label for="lastname" :value="__('Lastname')" />
            <x-text-input id="lastname" class="block mt-1 w-full" type="text" name="lastname" :value="old('lastname')" required autofocus autocomplete="lastname" />
            <x-input-error :messages="$errors->get('name')" class="mt-2" />
        </div>

        <!-- Email Address -->
        <div class="col-6 mt-4">
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" class="block mt-1 w-full" type="email" name="email" :value="old('email')" required autocomplete="email" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

        <!-- Phoneno -->
        <div class="col-6 mt-4">
            <x-input-label for="phoneno" :value="__('Phone number')" />
            <x-text-input id="phoneno" class="block mt-1 w-full" type="text" name="phoneno" :value="old('phoneno')" required autocomplete="phoneno" />
            <x-input-error :messages="$errors->get('email')" class="mt-2" />
        </div>

         <!-- Userid -->
         <div class="mt-4">
            <x-input-label for="studentid" :value="__('Studentid')" />
            <x-text-input id="studentid" class="block mt-1 w-full" type="text" name="studentid" :value="old('studentid')" required autofocus autocomplete="username" />
            <x-input-error :messages="$errors->get('studentid')" class="mt-2" />
        </div>

        <!-- Password -->
        <div class="col-6 mt-4">
            <x-input-label for="password" :value="__('Password')" />

            <x-text-input id="password" class="block mt-1 w-full"
                            type="password"
                            name="password"
                            required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password')" class="mt-2" />
        </div>

        <!-- Confirm Password -->
        <div class="col-6 mt-4">
            <x-input-label for="password_confirmation" :value="__('Confirm Password')" />

            <x-text-input id="password_confirmation" class="block mt-1 w-full"
                            type="password"
                            name="password_confirmation" required autocomplete="new-password" />

            <x-input-error :messages="$errors->get('password_confirmation')" class="mt-2" />
        </div>

        <div class="flex items-center justify-end mt-4">
            <a class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500" href="{{ route('login') }}">
                {{ __('Already registered?') }}
            </a>

            <x-primary-button class="ms-4">
                {{ __('Register') }}
            </x-primary-button>
        </div>
    </form>
</x-guest-layout>

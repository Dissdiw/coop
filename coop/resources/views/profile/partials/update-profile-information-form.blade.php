<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900">
            {{ __('Profile Information') }}
        </h2>

        <p class="mt-1 text-sm text-gray-600">
            {{ __("Update your account's profile information and email address.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div class="d-flex justify-content-center">
            <img style="border-radius: 50%;  width: 10rem; height: 10rem; object-fit: cover;" src="{{$user->image}}" id="img" alt="preview">
        </div>

        <div>
            <x-text-input id="fileImg" class="block mt-1 w-full border" type="file" name="fileImg" :value="old('fileImg')" accept="image/png, image/jpeg, image/jpg" required autofocus autocomplete="fileImg" />
            <x-input-error :messages="$errors->get('fileImg')" class="mt-2" />
        </div>

        <div>
            <x-input-label for="studentid" :value="__('Student ID')" />
            <x-text-input id="userid" name="userid" type="text" class="mt-1 block w-full" :value="old('userid', $user->userid)" disabled />
        </div>

        <div>
            <x-input-label for="firstname" :value="__('Firstname')" />
            <x-text-input id="firstname" name="firstname" type="text" class="mt-1 block w-full" :value="old('firstname', $user->firstname)" required autofocus autocomplete="firstname" />
            <x-input-error class="mt-2" :messages="$errors->get('firstname')" />
        </div>

        <div>
            <x-input-label for="lastname" :value="__('Lastname')" />
            <x-text-input id="lastname" name="lastname" type="text" class="mt-1 block w-full" :value="old('lastname', $user->lastname)" required autofocus autocomplete="lastname" />
            <x-input-error class="mt-2" :messages="$errors->get('lastname')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('Email')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800">
                        {{ __('Your email address is unverified.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 hover:text-gray-900 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500">
                            {{ __('Click here to re-send the verification email.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600">
                            {{ __('A new verification link has been sent to your email address.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>

        <div>
            <x-input-label for="phoneno" :value="__('Phone no.')" />
            <x-text-input id="phoneno" name="phoneno" type="text" class="mt-1 block w-full" :value="old('phoneno', $user->phoneno)" required autofocus autocomplete="phoneno" />
            <x-input-error class="mt-2" :messages="$errors->get('phoneno')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Save') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600"
                >{{ __('Saved.') }}</p>
            @endif
        </div>
    </form>

    <script type="text/javascript">
      // Preview
      fileImg.onchange = evt => {
        const [file] = fileImg.files
        if (file) {
          img.src = URL.createObjectURL(file)
        }
      }
    </script>

</section>

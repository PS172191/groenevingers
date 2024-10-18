<section>
    <header>
        <h2 class="text-lg font-medium text-gray-900 dark:text-gray-100">
            {{ __('Profielinformatie') }}
        </h2>   

        <p class="mt-1 text-sm text-gray-600 dark:text-gray-400">
            {{ __("Werk uw accountgegevens en e-mailadres bij.") }}
        </p>
    </header>

    <form id="send-verification" method="post" action="{{ route('verification.send') }}">
        @csrf
    </form>

    <form method="post" action="{{ route('profile.update') }}" class="mt-6 space-y-6">
        @csrf
        @method('patch')

        <div>
            <x-input-label for="name" :value="__('Naam')" />
            <x-text-input id="name" name="name" type="text" class="mt-1 block w-full" :value="old('name', $user->name)" required autofocus autocomplete="name" />
            <x-input-error class="mt-2" :messages="$errors->get('name')" />
        </div>

        <div>
            <x-input-label for="email" :value="__('E-mail')" />
            <x-text-input id="email" name="email" type="email" class="mt-1 block w-full" :value="old('email', $user->email)" required autocomplete="username" />
            <x-input-error class="mt-2" :messages="$errors->get('email')" />

            @if ($user instanceof \Illuminate\Contracts\Auth\MustVerifyEmail && ! $user->hasVerifiedEmail())
                <div>
                    <p class="text-sm mt-2 text-gray-800 dark:text-gray-200">
                        {{ __('Uw e-mailadres is niet geverifieerd.') }}

                        <button form="send-verification" class="underline text-sm text-gray-600 dark:text-gray-400 hover:text-gray-900 dark:hover:text-gray-100 rounded-md focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500 dark:focus:ring-offset-gray-800">
                            {{ __('Klik hier om de verificatie-e-mail opnieuw te verzenden.') }}
                        </button>
                    </p>

                    @if (session('status') === 'verification-link-sent')
                        <p class="mt-2 font-medium text-sm text-green-600 dark:text-green-400">
                            {{ __('Er is een nieuwe verificatielink naar uw e-mailadres verzonden.') }}
                        </p>
                    @endif
                </div>
            @endif
        </div>
        <div>
            <x-input-label for="phone" :value="__('Telefoon')" />
            <x-text-input id="phone" name="phone" type="tel" class="mt-1 block w-full" :value="old('phone', $user->phone)" required autocomplete="tel" />
            <x-input-error class="mt-2" :messages="$errors->get('phone')" />
        </div>
        <div>
            <x-input-label for="street" :value="__('Straat')" />
            <x-text-input id="street" name="street" type="text" class="mt-1 block w-full" :value="old('street', $user->street)" required autocomplete="address-line1" />
            <x-input-error class="mt-2" :messages="$errors->get('street')" />
        </div>
        
        <div>
            <x-input-label for="house_number" :value="__('Huisnummer')" />
            <x-text-input id="house_number" name="house_number" type="text" class="mt-1 block w-full" :value="old('house_number', $user->house_number)" required autocomplete="address-line2" />
            <x-input-error class="mt-2" :messages="$errors->get('house_number')" />
        </div>
        
        <div>
            <x-input-label for="postcode" :value="__('Postcode')" />
            <x-text-input id="postcode" name="postcode" type="text" class="mt-1 block w-full" :value="old('postcode', $user->postcode)" required autocomplete="postal-code" />
            <x-input-error class="mt-2" :messages="$errors->get('postcode')" />
        </div>
        
        <div>
            <x-input-label for="city" :value="__('Stad')" />
            <x-text-input id="city" name="city" type="text" class="mt-1 block w-full" :value="old('city', $user->city)" required autocomplete="address-level2" />
            <x-input-error class="mt-2" :messages="$errors->get('city')" />
        </div>

        <div class="flex items-center gap-4">
            <x-primary-button>{{ __('Opslaan') }}</x-primary-button>

            @if (session('status') === 'profile-updated')
                <p
                    x-data="{ show: true }"
                    x-show="show"
                    x-transition
                    x-init="setTimeout(() => show = false, 2000)"
                    class="text-sm text-gray-600 dark:text-gray-400"
                >{{ __('Opgeslagen.') }}</p>
            @endif
        </div>
    </form>
</section>

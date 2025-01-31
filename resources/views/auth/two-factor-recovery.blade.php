<x-lox::page
    title="{{ __('Two Factor Authentication') }}"
    h1="{{ __('Two Factor Authentication') }}"
    metaRobots="noindex, nofollow"
>
    <x-lox::content class="max-w-xl">
        <p class="mb-4 text-sm text-gray-600">
            {{ __('Please confirm access to your account by entering one of your emergency recovery codes.') }}
        </p>

        <x-lox::validation-errors
            class="mb-4"
        />

        <form
            method="post"
            action="{{ route('two-factor.login') }}"
        >
            @csrf

            <div class="mt-4">
                <x-lox::form.input
                    :label="__('Recovery Code')"
                    :placeholder="__('Recovery Code')"
                    name="recovery_code"
                    autocomplete="one-time-code"
                />
            </div>

            <div class="flex items-center justify-end mt-4">
                <x-lox::button class="ml-4">
                    {{ __('Login') }}
                </x-lox::button>
            </div>
        </form>
    </x-lox::content>

    <p>
        <a
            class="link"
            href="{{ route('two-factor.login') }}"
        >
            {{ __('Use an authentication code') }}
        </a>
    </p>

</x-lox::page>

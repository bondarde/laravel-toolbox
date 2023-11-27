<div
    x-data="{ open: false }"
>
    <button
        @click="open = !open"
    > {{ $button }}</button>

    <div
        class="fixed inset-0 overflow-y-auto z-10"
        x-show="open"
        style="display: none"
    >
        <div
            @click="open = false"
            class="fixed inset-0 bg-black/50"
        ></div>


        <div class="relative min-h-screen flex items-center justify-center p-4">
            <div
                class="
                    relative w-full max-w-2xl     max-h-screen overflow-y-scroll
                    bg-white dark:bg-black rounded-xl shadow-lg p-8
                "
            >
                <div class="flex gap-8 justify-between mb-4">
                    <h2>{{ $title ?? '' }}</h2>
                    <button
                        @click="open = false"
                        type="button"
                        class="p-2 opacity-75 -mt-4 -mr-2"
                    >
                        ×
                        <span class="sr-only">
                            {{ __('Close modal') }}
                        </span>
                    </button>
                </div>

                <div class="overflow-y-auto">
                    {{ $slot }}
                </div>

                <div class="mt-8">
                    <div class="flex justify-end">
                        <x-button
                            color="light"
                            @click="open = false"
                        >
                            {{ __('Cancel') }}
                        </x-button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

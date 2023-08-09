<div>
    <h2>{{ $pageTitle }}</h2>

    <x-content
        padding=""
    >
        @if($supportsFilters || $supportsSorts || $supportsTextSearch)
            <div class="flex gap-4 p-4">
                <div class="grow">
                    @if($supportsTextSearch)
                        <livewire:model-list.search
                            :value="$searchQuery"
                        />
                    @endif
                </div>
                <div>
                    @if($supportsFilters || $supportsSorts)
                        <x-button
                            class="h-full"
                            color="light"
                            wire:click="$toggle('isFilterPanelVisible')"
                            :badge="$filterBadgeCount > 0 ? $filterBadgeCount : null"
                        >
                            <svg
                                class="opacity-70 w-4 h-4"
                                xmlns="http://www.w3.org/2000/svg"
                                viewBox="0 0 20 20"
                                fill="currentColor"
                                aria-hidden="true"
                            >
                                <path
                                    fill-rule="evenodd"
                                    clip-rule="evenodd"
                                    d="M2.628 1.601C5.028 1.206 7.49 1 10 1s4.973.206 7.372.601a.75.75 0 01.628.74v2.288a2.25 2.25 0 01-.659 1.59l-4.682 4.683a2.25 2.25 0 00-.659 1.59v3.037c0 .684-.31 1.33-.844 1.757l-1.937 1.55A.75.75 0 018 18.25v-5.757a2.25 2.25 0 00-.659-1.591L2.659 6.22A2.25 2.25 0 012 4.629V2.34a.75.75 0 01.628-.74z"
                                ></path>
                            </svg>
                        </x-button>
                    @endif
                </div>
            </div>
            @if($isFilterPanelVisible)
                <div class="p-4 border-t">
                    <livewire:model-list.filter
                        :$model
                        :$routeName
                        :$activeFilters
                        :$searchQuery
                        :$supportsFilters
                        :$supportsSorts
                        key="{{ $searchQuery . ':' . $filters.':' . $sorts }}"
                    />
                </div>
            @endif
        @endif

        <livewire:model-list.content
            :$searchQuery
            :$items
            :pagination="$links"
            key="{{ Str::random() }}"
        />
    </x-content>
</div>

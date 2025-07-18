@php
    $search = request()->query('search', '');
    $with_trashed = request()->query('with_trashed', 0);
    $page = request()->query('page', 1);

    $changePageGetUrl = function ($page) use ($search, $with_trashed) {
        return route(
            'campaigns.index',
            compact('search', 'with_trashed', 'page')
        );
    };
@endphp

<x-layouts.app>
    <x-slot:header>
        <x-breadcrumbs :crumbs="$crumbs" ></x-breadcrumbs>
    </x-slot:header>

    <x-section-content>
        <x-card class="flex flex-col gap-4">
            <div class="w-full flex justify-between items-center">
                <div class="text-center">
                    <x-button.link href="{{ route('campaigns.create') }}"> {{ __("Create a new campaign") }} </x-button.link>
                </div>

                <div class="w-2/3 flex flex-row gap-4">
                    <x-form :action="route('campaigns.index')" class="!flex-row items-center w-min" x-data x-on:change="$el.submit()">
                        <x-input.checkbox name="with_trashed" id="with_trashed" value="1" :checked="$with_trashed" ></x-input.checkbox>
                        <x-input.adornment.label for="with_trashed" class="ml-2">
                            {{ __('Show Trashed') }}
                        </x-input.adornment.label>
                    </x-form>

                    <x-form :action="route('campaigns.index')" class="flex-1">
                        <x-input.text name="search" id="search" :value="$search" placeholder="{{ __('Search') }}" autofocus />
                    </x-form>
                </div>
            </div>

            <x-table class="w-full ">
                <x-slot:head>
                    <th class="min-w-3">#</th>
                    <th class="w-full">{{ __("Title") }}</th>
                    <th>{{ __("Actions") }}</th>
                </x-slot:head>

                <x-slot:body>
                    @forelse ($campaigns as $campaign)
                        <tr>
                            <th>{{ $campaign->id }}</th>
                            <td>{{ $campaign->title }}</td>
                            <td>
                                @if($campaign->trashed())
                                    {{ __("Deleted") }}
                                @endif

                                @if(!$campaign->trashed())
                                    <x-form method="DELETE" class="w-min"
                                        :action="route('campaigns.destroy', compact('campaign'))"
                                        x-data="{}"
                                        x-on:submit.prevent="if (confirm('{{ __('Are you sure you want to delete this campaign?') }}')) { $el.submit(); }"
                                    >
                                        <x-button.primary type="submit">
                                            {{ __('Delete') }}
                                        </x-button.primary>
                                    </x-form>
                                @endif
                            </td>
                        </tr>
                    @endforeach
                </x-slot:body>
            </x-table>

            <x-pagination class="w-full justify-end"
                :pages="$campaigns->lastPage()"
                :getUrl="$changePageGetUrl"
                :currentPage="$page"
            />
        </x-card>
    </x-section-content>
</x-layouts.app>

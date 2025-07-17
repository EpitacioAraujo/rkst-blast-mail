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

                <x-form :action="route('campaigns.index')" class="w-1/3">
                    <x-input.text name="search" id="search" :value="request('search')" placeholder="{{ __('Search') }}" autofocus />
                </x-form>
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
                                <x-form method="DELETE" class="w-min"
                                    :action="route('campaigns.destroy', compact('campaign'))"
                                    x-data="{}"
                                    x-on:submit.prevent="if (confirm('{{ __('Are you sure you want to delete this campaign?') }}')) { $el.submit(); }"
                                >
                                    <x-button.primary type="submit">
                                        {{ __('Delete') }}
                                    </x-button.primary>
                                </x-form>
                            </td>
                        </tr>
                    @endforeach
                </x-slot:body>
            </x-table>

            <x-pagination class="w-full justify-end"
                :pages="$campaigns->lastPage()"
                :getUrl="fn ($page) => route('campaigns.index', [
                    'search' => request('search'),
                    'page' => $page
                ])"
                :currentPage="request()->query('page', 1)"
            />
        </x-card>
    </x-section-content>
</x-layouts.app>

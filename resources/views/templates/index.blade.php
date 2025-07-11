<x-layouts.app>
    <x-slot:header>
        <x-breadcrumbs :crumbs="$crumbs" ></x-breadcrumbs>
    </x-slot:header>

    <x-section-content>
        <x-card class="flex flex-col gap-4">
            <div class="w-full flex justify-between items-center">
                <div class="text-center">
                    <x-button.link href="{{ route('templates.create') }}"> {{ __("Create a new template") }} </x-button.link>
                </div>

                <x-form :action="route('templates.index')" class="w-1/3">
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
                    @forelse ($templates as $template)
                        <tr>
                            <th>{{ $template->id }}</th>
                            <td>{{ $template->title }}</td>
                            <td>
                                <x-button.link :href="route('templates.edit', compact('template') )"> {{ __('Edit') }} </x-button.link>
                            </td>
                        </tr>
                    @endforeach
                </x-slot:body>
            </x-table>

            <x-pagination class="w-full justify-end"
                :pages="$templates->lastPage()"
                :getUrl="fn ($page) => route('templates.index', [
                    'search' => request('search'),
                    'page' => $page
                ])"
                :currentPage="request()->query('page', 1)"
            />
        </x-card>
    </x-section-content>
</x-layouts.app>

@php
    $crumbs = [
        [
            "label" => __('Email lists')
        ]
    ];
@endphp

<x-layouts.app>
    <x-slot:header>
        <x-breadcrumbs :crumbs="$crumbs" ></x-breadcrumbs>
    </x-slot:header>

    <x-section-content>
        <x-card class="flex flex-col gap-4">
            <div class="w-full flex justify-between items-center">
                <div class="text-center">
                    <x-link-button href="{{ route('email_lists.create') }}"> {{ __("Create a new email list") }} </x-link-button>
                </div>

                <x-form :action="route('email_lists.index')" class="w-1/3">
                    <x-text-input name="search" id="search" :value="request('search')" placeholder="{{ __('Search') }}" autofocus />
                </x-form>
            </div>

            <x-table class="w-full ">
                <x-slot:head>
                    <th>#</th>
                    <th>{{ __("Title") }}</th>
                    <th>{{ __("Subscribers") }}</th>
                    <th>{{ __("Actions") }}</th>
                </x-slot:head>

                <x-slot:body>
                    @forelse ($emailLists as $emailList)
                        <tr>
                            <th>{{ $emailList->id }}</th>
                            <td>{{ $emailList->title }}</td>
                            <td>{{ $emailList->subscribers_count }}</td>
                            <td>
                                <x-link-button :href="route('email_lists.show', [$emailList])"> {{ __('Show') }} </x-link-button>
                            </td>
                        </tr>
                    @endforeach
                </x-slot:body>
            </x-table>

            <x-pagination class="w-full justify-end"
                :pages="$emailLists->lastPage()"
                :getUrl="fn ($page) => route('email_lists.index', [
                    'search' => request('search'),
                    'page' => $page
                ])"
                :currentPage="request()->query('page', 1)"
            />
        </x-card>
    </x-section-content>
</x-layouts.app>

@php
    $crumbs = [
        [
            "label" => __('Email lists'),
            "url" => route('email_lists.index')
        ],
        [
            "label" => $emailList->title,
        ]
    ];
@endphp

<x-layouts.app>
    <x-slot:header>
        <x-breadcrumbs :crumbs="$crumbs" ></x-breadcrumbs>
    </x-slot:header>

    <x-section-content>
        <x-card class="flex flex-col gap-4">
            <div class="w-full flex flex-row justify-between">
                <div></div>

                <x-form id="search_form" :action="route('email_lists.show', $emailList)" class="w-1/3">
                    <x-text-input id="search" name="search" :value="request('search')" placeholder="{{ __('Search')}} " autofocus />
                </x-form>
            </div>

            <x-table class="w-full ">
                <x-slot:head>
                    <th></th>
                    <th>Name</th>
                    <th>Email</th>
                </x-slot:head>

                <x-slot:body>
                    @foreach($subscribers as $subscriber)
                        <tr>
                            <th>{{ $subscriber->id }}</th>
                            <td>{{ $subscriber->name }}</td>
                            <td>{{ $subscriber->email }}</td>
                        </tr>
                    @endforeach
                </x-slot:body>
            </x-table>

            <x-pagination class="w-full justify-end"
                :pages="$subscribers->lastPage()"
                :getUrl="fn ($page) => route('email_lists.show', [
                    'emailList' => $emailList,
                    'search' => request('search'),
                    'page' => $page
                ])"
                :currentPage="request()->query('page', 0)"
            />
        </x-card>
    </x-section-content>
</x-layouts.app>

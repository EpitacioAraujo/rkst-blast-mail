<x-layouts.app>
    <x-section-content>
        <x-card class="flex flex-col gap-4">
            <div class="w-full grid grid-cols-4 gap-4">
                <x-form id="search_form" :action="route('email_lists.show', $emailList)">
                    <x-text-input id="search" name="search" :value="request('search')" placeholder="{{ __('Search')}} " autofocus />
                </x-form>

                <x-primary-button class="w-min" type="submit" form="search_form">
                    {{ __('Search') }}
                </x-primary-button>
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
                        <th>{{ $loop->iteration }}</th>
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
            />
        </x-card>
    </x-section-content>
</x-layouts.app>

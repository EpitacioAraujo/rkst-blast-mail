<x-layouts.app>
    <x-slot:header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Email lists') }}
        </h2>
    </x-slot:header>

    <x-section-content>
        <x-card>
            <div class="mb-4 w-full flex justify-between items-center">
                <div class="text-center">
                    <x-link-button href="{{ route('email_lists.create') }}"> {{ __("Create a new email list") }} </x-link-button>
                </div>
            </div>

            @forelse ($emailLists as $emailList)
                <div class="mb-4 flex flex-col items-center gap-2">
                    <x-link-button href=" {{ route('email_lists.show', $emailList) }}" class="w-full">
                        {{ $emailList->title }}
                    </x-link-button>
                </div>
            @empty
                <div class="text-center">
                    <x-link-button href="{{ route('email_lists.create') }}"> {{ __("Create your first email list") }} </x-link-button>
                </div>
            @endforelse
        </x-card>
    </x-section-content>
</x-layouts.app>

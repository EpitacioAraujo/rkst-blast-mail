<x-layouts.app>
    <x-slot:header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Email lists') }}
        </h2>
    </x-slot:header>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-6 text-gray-900">
                    @forelse ($emailLists as $emailList)
                        <div class="mb-4">
                            <x-link-button href="/">
                                {{ $emailList->title }}
                            </x-link-button>
                        </div>
                    @empty
                        <div class="text-center">
                            <x-link-button href="{{ route('email_lists.create') }}"> {{ __("Create your first email list") }} </x-link-button>
                        </div>
                    @endforelse
                </div>
            </div>
        </div>
    </div>
</x-layouts.app>

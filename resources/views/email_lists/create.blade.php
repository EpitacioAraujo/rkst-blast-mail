<x-layouts.app>
    <x-slot:header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Email lists') }} > {{ __('Create list') }}
        </h2>
    </x-slot:header>

    <x-card>
        <x-form :action="route('email_lists.create')" method="POST">
            <div class="flex flex-col gap-2">
                <x-input-label for="title" :value="__('Title')" />
                <x-text-input id="title" class="block mt-1 w-full" name="title" :value="old('title')" autofocus />
                <x-input-error :messages="$errors->get('title')" />
            </div>

            <div class="flex flex-col gap-2">
                <x-input-label for="file" :value="__('File')" />
                <x-text-input id="file" class="block mt-1 w-full" type="file" name="file" :value="old('file')" autofocus />
                <x-input-error :messages="$errors->get('file')" />
            </div>

            <div class="flex items-center gap-4">
                <x-secondary-button type="submit">
                    {{ __('Cancel') }}
                </x-secondary-button>

                <x-primary-button type="submit">
                    {{ __('Save') }}
                </x-primary-button>
            </div>
        </x-form>
    </x-card>
</x-layouts.app>

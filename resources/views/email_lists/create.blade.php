<x-layouts.app>
    <x-slot:header>
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Email lists') }} > {{ __('Create list') }}
        </h2>
    </x-slot:header>

    <x-section-content>
        <x-card>
            <x-form :action="route('email_lists.create')" method="POST">
                <div class="flex flex-col gap-2">
                    <x-input.adornment.label for="title" :value="__('Title')" />
                    <x-input.text id="title" class="block mt-1 w-full" name="title" :value="old('title')" autofocus />
                    <x-input.adornment.error :messages="$errors->get('title')" />
                </div>

                <div class="flex flex-col gap-2">
                    <x-input.adornment.label for="file" :value="__('File')" />
                    <x-input.text id="file" class="block mt-1 w-full" type="file" name="file" :value="old('file')" autofocus />
                    <x-input.adornment.error :messages="$errors->get('file')" />
                </div>

                <div class="flex items-center gap-4">
                    <x-button.secondary type="submit">
                        {{ __('Cancel') }}
                    </x-button.secondary>

                    <x-button.primary type="submit">
                        {{ __('Save') }}
                    </x-button.primary>
                </div>
            </x-form>
        </x-card>
    </x-section-content>
</x-layouts.app>

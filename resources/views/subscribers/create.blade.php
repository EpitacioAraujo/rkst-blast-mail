<x-layouts.app>
    <x-slot:header>
        <x-breadcrumbs :crumbs="$crumbs" />
    </x-slot:header>

    <x-section-content>
        <x-card>
            <x-form :action="route('email_lists.subscriber.create', compact('emailList'))" method="POST">
                <div class="flex flex-col gap-2">
                    <x-input.adornment.label for="name" :value="__('Name')" />
                    <x-input.text id="name" class="block mt-1 w-full" name="name" :value="old('name')" autofocus />
                    <x-input.adornment.error :messages="$errors->get('name')" />
                </div>

                <div class="flex flex-col gap-2">
                    <x-input.adornment.label for="email" :value="__('Email')" />
                    <x-input.text id="email" class="block mt-1 w-full" name="email" :value="old('email')" />
                    <x-input.adornment.error :messages="$errors->get('email')" />
                </div>

                <div class="flex items-center gap-4">
                    <x-button.link :href="route('email_lists.show', $emailList)">
                        {{ __('Cancel') }}
                    </x-button.link>

                    <x-button.primary type="submit">
                        {{ __('Save') }}
                    </x-button.primary>
                </div>
            </x-form>
        </x-card>
    </x-section-content>
</x-layouts.app>

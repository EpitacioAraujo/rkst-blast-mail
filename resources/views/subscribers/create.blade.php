<x-layouts.app>
    <x-slot:header>
        <x-breadcrumbs :crumbs="$crumbs" />
    </x-slot:header>

    <x-section-content>
        <x-card>
            <x-form :action="route('email_lists.subscriber.create', compact('emailList'))" method="POST">
                <div class="flex flex-col gap-2">
                    <x-input-label for="name" :value="__('Name')" />
                    <x-text-input id="name" class="block mt-1 w-full" name="name" :value="old('name')" autofocus />
                    <x-input-error :messages="$errors->get('name')" />
                </div>

                <div class="flex flex-col gap-2">
                    <x-input-label for="email" :value="__('Email')" />
                    <x-text-input id="email" class="block mt-1 w-full" name="email" :value="old('email')" />
                    <x-input-error :messages="$errors->get('email')" />
                </div>

                <div class="flex items-center gap-4">
                    <x-link-button :href="route('email_lists.show', $emailList)">
                        {{ __('Cancel') }}
                    </x-link-button>

                    <x-primary-button type="submit">
                        {{ __('Save') }}
                    </x-primary-button>
                </div>
            </x-form>
        </x-card>
    </x-section-content>
</x-layouts.app>

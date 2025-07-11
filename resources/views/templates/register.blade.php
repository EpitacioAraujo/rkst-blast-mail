@php
    $formAction = isset($template)
        ? route( 'templates.update', compact('template') )
        : route( 'templates.store' );

    $method = isset($template) ? 'PUT' : 'POST';
@endphp

<x-layouts.app>
    <x-slot:header>
        <x-breadcrumbs :crumbs="$crumbs" />
    </x-slot:header>

    <x-section-content>
        <x-card class="flex flex-col gap-4">
            <x-form :action="$formAction" :method="$method" id="template_form">
                <div class="flex flex-col gap-2">
                    <x-input-label for="title" :value="__('Title')" />
                    <x-text-input id="title" class="block mt-1 w-full" name="title" :value="old('title') ?? ($template->title ?? null)" />
                    <x-input-error :messages="$errors->get('title')" />
                </div>

                <div class="flex flex-col gap-2">
                    <x-input-label for="body" :value="__('Body')" />
                    <x-text-input id="body" class="block mt-1 w-full" name="body" :value="old('body') ?? ($template->body ?? null)" />
                    <x-input-error :messages="$errors->get('body')" />
                </div>
            </x-form>

            <div class="flex items-center gap-4">
                <x-link-button :href="route('templates.index')">
                    {{ __('Cancel') }}
                </x-link-button>

                <x-primary-button type="submit" form="template_form">
                    {{ __('Save') }}
                </x-primary-button>
            </div>
        </x-card>
    </x-section-content>
</x-layouts.app>

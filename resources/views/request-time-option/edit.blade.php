<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Request Time Option Edit') }}
        </h2>
    </x-slot>

    <livewire:admin.request-time-option.request-time-option-edit :request_time_option_id="$request_time_option_id" />

    <livewire:admin.request-time-option.request-time-option-list />


</x-app-layout>

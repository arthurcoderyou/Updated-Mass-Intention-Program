<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Request Time Options') }}
        </h2>
    </x-slot>
    @if(Auth::user()->hasRole('Super Admin') || Auth::user()->can('time create'))
    <livewire:admin.request-time-option.request-time-option-create />
    @endif

    @if(Auth::user()->hasRole('Super Admin') || Auth::user()->can('time manage'))
    <livewire:admin.request-time-option.request-time-option-list />
    @endif


</x-app-layout>

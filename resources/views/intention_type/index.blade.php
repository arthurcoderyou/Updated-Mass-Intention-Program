<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Intention Types') }}
        </h2>
    </x-slot>

    @if(Auth::user()->hasRole('Super Admin') || Auth::user()->can('type manage'))
    <livewire:admin.intention-type.intention-type-create />
    @endif

    @if(Auth::user()->hasRole('Super Admin') || Auth::user()->can('type manage'))
    <livewire:admin.intention-type.intention-type-list />
    @endif

</x-app-layout>

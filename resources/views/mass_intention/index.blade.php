<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mass Intentions') }}
        </h2>
    </x-slot>
    @if(Auth::user()->hasRole('Super Admin') || Auth::user()->can('mass_intention manage'))
    <livewire:admin.mass-intention.mass-intention-list />
    @endif


</x-app-layout>

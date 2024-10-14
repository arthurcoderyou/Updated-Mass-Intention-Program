<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Roles') }}
        </h2>
    </x-slot>

    @if(Auth::user()->hasRole('Super Admin') || Auth::user()->can('role create'))
    <livewire:admin.role-permission.role-create />
    @endif


    @if(Auth::user()->hasRole('Super Admin') || Auth::user()->can('role manage'))
    <livewire:admin.role-permission.role-list />
    @endif

</x-app-layout>

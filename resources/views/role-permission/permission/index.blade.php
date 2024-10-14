<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Permissions') }}
        </h2>
    </x-slot>
    @if(Auth::user()->hasRole('Super Admin') || Auth::user()->can('permission create'))
    <livewire:admin.role-permission.permission-create />
    @endif


    @if(Auth::user()->hasRole('Super Admin') || Auth::user()->can('permission manage'))
    <livewire:admin.role-permission.permission-list />
    @endif

</x-app-layout>

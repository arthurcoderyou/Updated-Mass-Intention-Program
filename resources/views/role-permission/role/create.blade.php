<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Role Create') }}
        </h2>
    </x-slot>

    <livewire:admin.role-permission.role-create />


</x-app-layout>

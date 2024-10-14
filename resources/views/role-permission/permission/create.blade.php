<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Permission Create') }}
        </h2>
    </x-slot>

    <livewire:admin.role-permission.permission-create />


</x-app-layout>

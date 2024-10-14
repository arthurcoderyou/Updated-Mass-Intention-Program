<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Role Edit') }}
        </h2>
    </x-slot>

    <livewire:admin.role-permission.role-edit :role_id="$role_id"/>
    <livewire:admin.role-permission.role-list />


</x-app-layout>

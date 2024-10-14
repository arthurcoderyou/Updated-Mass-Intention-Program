<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Permission Edit') }}
        </h2>
    </x-slot>

    <livewire:admin.role-permission.permission-edit :permission_id="$permission_id" />

    <livewire:admin.role-permission.permission-list />

</x-app-layout>

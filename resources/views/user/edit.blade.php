<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('User Edit') }}
        </h2>
    </x-slot>

    <livewire:admin.user.user-edit :user_id="$user_id"/>
    <livewire:admin.user.user-list />

</x-app-layout>

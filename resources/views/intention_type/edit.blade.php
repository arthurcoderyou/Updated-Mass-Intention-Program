<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Intention Type Edit') }}
        </h2>
    </x-slot>

    <livewire:admin.intention-type.intention-type-edit :intention_type_id="$intention_type_id"/>

    <livewire:admin.intention-type.intention-type-list />


</x-app-layout>

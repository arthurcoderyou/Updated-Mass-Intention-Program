<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Mass Intention Edit') }}
        </h2>
    </x-slot>

    <livewire:admin.mass-intention.mass-intention-edit :mass_intention_id="$mass_intention_id" />


</x-app-layout>

<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Activity Logs') }}
        </h2>
    </x-slot>

    @if(Auth::user()->hasRole('Super Admin') || Auth::user()->can('profile update_profile_information'))
    <livewire:admin.activity-logs.activity-log-list />
    @endif

</x-app-layout>

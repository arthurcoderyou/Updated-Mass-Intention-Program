<x-app-layout>

    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Users') }}
        </h2>
    </x-slot>
    @if(Auth::user()->hasRole('Super Admin') || Auth::user()->can('user create'))
    <livewire:admin.user.user-create />
    @endif

    @if(Auth::user()->hasRole('Super Admin') || Auth::user()->can('user manage'))
    <livewire:admin.user.user-list />
    @endif

</x-app-layout>

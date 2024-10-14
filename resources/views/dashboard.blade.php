<x-app-layout>
    <x-slot name="header" class="mt-1">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>



    <livewire:admin.report.report />



    {{-- <script>


        Swal.fire({
            position: "center",
            icon: "info",
            // title: "Your work has been saved",
            text: 'Please reload page once if you visit this page to use all of its functionalities',
            showConfirmButton: false,
            timer: 3000
        });
    </script> --}}



</x-app-layout>

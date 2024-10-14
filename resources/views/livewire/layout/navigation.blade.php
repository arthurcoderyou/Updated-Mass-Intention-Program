<?php

use App\Livewire\Actions\Logout;
use Livewire\Volt\Component;

new class extends Component
{
    /**
     * Log the current user out of the application.
     */
    public function logout(Logout $logout): void
    {
        $logout();

        $this->redirect('/', navigate: true);
    }
}; ?>


<!-- ========== HEADER ========== -->
<header class="sticky top-0 inset-x-0 flex flex-wrap lg:justify-start lg:flex-nowrap z-50 w-full text-sm ">
  <nav class="my-2 relative max-w-7xl w-full bg-white border border-gray-200 rounded-[2rem] mx-2 py-2.5 lg:flex lg:items-center lg:justify-between lg:py-0 lg:px-4 lg:mx-auto dark:bg-neutral-900 dark:border-neutral-700">
    <div class="px-4 lg:px-0 flex justify-between items-center">
      <!-- Logo -->
      <div>
        <a class="flex-none rounded-md text-xl inline-block font-semibold focus:outline-none focus:opacity-80" href="{{ route('home') }}" aria-label="Preline">

          {{-- <svg fill="#000000" class="w-24 h-auto" width="116" height="32"  version="1.1" id="Layer_1" xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" viewBox="0 0 512 512" xml:space="preserve"><g id="SVGRepo_bgCarrier" stroke-width="0"></g><g id="SVGRepo_tracerCarrier" stroke-linecap="round" stroke-linejoin="round"></g><g id="SVGRepo_iconCarrier"> <g> <g> <path d="M477.42,340.613l-1.419-0.467c-0.001,0-0.002-0.001-0.003-0.001l-116.787-38.448V163.76c0-2.95-1.26-5.598-3.261-7.46 c-0.032-0.033-0.054-0.065-0.091-0.098l-89.919-81.474V44.102h14.021c5.633,0,10.199-4.566,10.199-10.199 c0-5.633-4.566-10.199-10.199-10.199h-14.021V10.199C265.941,4.566,261.375,0,255.742,0c-5.633,0-10.199,4.566-10.199,10.199 v13.505h-14.02c-5.633,0-10.199,4.566-10.199,10.199c0,5.633,4.566,10.199,10.199,10.199h14.02v30.632l-89.721,81.475 c-0.022,0.02-0.031,0.041-0.05,0.061c-2.019,1.863-3.292,4.524-3.292,7.489v137.942l-116.48,38.442 c-0.002,0.001-0.005,0.001-0.007,0.002l-1.419,0.468c-4.18,1.38-7.004,5.284-7.004,9.686v151.5 c0,5.633,4.566,10.199,10.199,10.199h436.464c5.633,0,10.199-4.566,10.199-10.199v-151.5 C484.431,345.897,481.604,341.99,477.42,340.613z M152.479,491.602H47.966v-131.57h104.512V491.602z M152.479,339.633h-49.846 l49.846-16.45V339.633z M255.75,93.02l66.816,60.542H189.08L255.75,93.02z M297.513,491.602h-83.337v-50.933 c0-22.61,15.866-41.005,35.368-41.005h12.601c19.502,0,35.368,18.395,35.368,41.005V491.602z M338.813,491.602h-20.901v-50.933 c0-33.858-25.017-61.403-55.766-61.403h-12.601c-30.75,0-55.766,27.545-55.766,61.403v50.933h-20.901V349.833V173.96h165.936 V491.602z M359.211,323.172l50.002,16.462h-50.002V323.172z M464.033,491.602H359.211v-131.57h104.821V491.602z"></path> </g> </g> <g> <g> <path d="M255.742,214.367c-14.614,0-26.505,11.89-26.505,26.505v72.328c0,5.632,4.566,10.199,10.199,10.199h32.61 c5.633,0,10.199-4.566,10.199-10.199v-72.328C282.246,226.257,270.357,214.367,255.742,214.367z M261.848,303h-12.212v-62.128 c0-3.367,2.74-6.106,6.106-6.106c3.367,0,6.105,2.74,6.105,6.106V303z"></path> </g> </g> <g> <g> <path d="M390.752,463.775h-2.061c-5.633,0-10.199,4.566-10.199,10.199c0,5.633,4.566,10.199,10.199,10.199h2.061 c5.633,0,10.199-4.566,10.199-10.199C400.952,468.341,396.385,463.775,390.752,463.775z"></path> </g> </g> <g> <g> <path d="M446.404,463.775H422.7c-5.633,0-10.199,4.566-10.199,10.199c0,5.633,4.566,10.199,10.199,10.199h23.704 c5.633,0,10.199-4.566,10.199-10.199C456.604,468.341,452.037,463.775,446.404,463.775z"></path> </g> </g> </g></svg> --}}

            <img src="{{ asset('assets/img/logo.png') }}" alt="logo" class="" width="32px" height="32px">

        </a>
      </div>
      <!-- End Logo -->

      <div class="lg:hidden">
        <!-- Toggle Button -->
        <button type="button"
          class="hs-collapse-toggle flex justify-center items-center size-6 border border-gray-200 text-black rounded-full hover:bg-gray-200 focus:outline-none focus:bg-gray-200 dark:border-neutral-700 dark:text-neutral-400 dark:hover:bg-neutral-700 dark:focus:bg-neutral-700"
          id="hs-navbar-header-floating-collapse"
          aria-expanded="false" aria-controls="hs-navbar-header-floating"
          aria-label="Toggle navigation" data-hs-collapse="#hs-navbar-header-floating">
          <svg class="hs-collapse-open:hidden shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><line x1="3" x2="21" y1="6" y2="6"/><line x1="3" x2="21" y1="12" y2="12"/><line x1="3" x2="21" y1="18" y2="18"/></svg>
          <svg class="hs-collapse-open:block hidden shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M18 6 6 18"/><path d="m6 6 12 12"/></svg>
        </button>
        <!-- End Toggle Button -->
      </div>
    </div>

    <div id="hs-navbar-header-floating" class="hidden hs-collapse overflow-hidden transition-all duration-300 basis-full grow lg:block" aria-labelledby="hs-navbar-header-floating-collapse">
      <div class="flex flex-col lg:flex-row lg:items-center lg:justify-end gap-2 lg:gap-3 mt-3 lg:mt-0 py-2 lg:py-0 lg:ps-7">

        @auth
            <x-nav-link :href="route('dashboard')" :active="request()->routeIs('dashboard')"  >
                {{ __('Dashboard') }}
            </x-nav-link>


            @if(Auth::user()->hasRole('Super Admin') || Auth::user()->can('mass_intention manage'))
            <x-nav-link  :href="route('mass_intentions.index')" :active="request()->routeIs('mass_intentions.index') || request()->routeIs('mass_intentions.edit') || request()->routeIs('mass_intentions.create')"  >
                {{ __('Mass Intentions') }}
                <span class="inline-flex items-center py-0.5 px-1.5 rounded-full text-xs font-medium bg-customBlue text-white">
                    {{ mass_intentions_count() }}
                </span>
            </x-nav-link>
            @endif


            @if(Auth::user()->hasRole('Super Admin') || Auth::user()->can('time manage'))
            <x-nav-link :href="route('request_time_options.index')" :active="request()->routeIs('request_time_options.index') || request()->routeIs('request_time_options.edit')" >
                {{ __('Times') }}
                <span class="inline-flex items-center py-0.5 px-1.5 rounded-full text-xs font-medium bg-customBlue text-white">
                    {{ request_time_option_count() }}
                </span>
            </x-nav-link>

            @endif

            @if(Auth::user()->hasRole('Super Admin') || Auth::user()->can('type manage'))
            <x-nav-link :href="route('intention_types.index')" :active="request()->routeIs('intention_types.index') || request()->routeIs('intention_types.edit')" >
                {{ __('Types') }}
                <span class="inline-flex items-center py-0.5 px-1.5 rounded-full text-xs font-medium bg-customBlue text-white">
                    {{ intention_type_count() }}
                </span>
            </x-nav-link>
            @endif


            @if(Auth::user()->hasRole('Super Admin') || Auth::user()->can('user manage'))
                <x-nav-link :href="route('user.index')" :active="request()->routeIs('user.index') || request()->routeIs('user.edit')" >
                    {{ __('Users') }}
                    <span class="inline-flex items-center py-0.5 px-1.5 rounded-full text-xs font-medium bg-customBlue text-white">
                        {{ user_count() }}
                    </span>
                </x-nav-link>
            @endif

            @if(Auth::user()->hasRole('Super Admin') || Auth::user()->can('role manage'))

                <x-nav-link :href="route('roles.index')" :active="request()->routeIs('roles.index') || request()->routeIs('roles.edit') || request()->routeIs('roles.add_permission')" >
                    {{ __('Roles') }}
                    <span class="inline-flex items-center py-0.5 px-1.5 rounded-full text-xs font-medium bg-customBlue text-white">
                        {{ role_count() }}
                    </span>
                </x-nav-link>
            @endif

            @if(Auth::user()->hasRole('Super Admin') || Auth::user()->can('permission manage'))

                <x-nav-link :href="route('permissions.index')" :active="request()->routeIs('permissions.index') || request()->routeIs('permissions.edit')" >
                    {{ __('Permissions') }}
                    <span class="inline-flex items-center py-0.5 px-1.5 rounded-full text-xs font-medium bg-customBlue text-white">
                        {{ permission_count() }}
                    </span>
                </x-nav-link>

            @endif


            @if(Auth::user()->hasRole('Super Admin') || Auth::user()->can('activity_log manage'))
            <x-nav-link :href="route('activity_logs.index')" :active="request()->routeIs('activity_logs.index')" >
                {{ __('Activity Logs') }}
                <span class="inline-flex items-center py-0.5 px-1.5 rounded-full text-xs font-medium bg-customBlue text-white">
                    {{ activity_logs_count() }}
                </span>
            </x-nav-link>
            @endif


            @if(Auth::user()->hasRole('Super Admin') || Auth::user()->can('profile manage'))
            <x-nav-link :href="route('profile')" :active="request()->routeIs('profile')" >
                {{ __('Profile') }}
            </x-nav-link>
            @endif


            <button wire:click="logout" class="py-0.5 md:py-3 px-4 md:px-1 border-s-2 md:border-s-0 md:border-b-2 border-transparent text-black hover:text-gray-800 focus:outline-none dark:text-neutral-400 dark:hover:text-neutral-200">

                    {{ __('Log Out') }}
            </button>

        @endauth

        @guest
            <x-nav-link :href="route('login')" :active="request()->routeIs('login')" >
                {{ __('Login') }}
            </x-nav-link>
            <x-nav-link :href="route('register')" :active="request()->routeIs('register')" >
                {{ __('Register') }}
            </x-nav-link>
        @endguest




        </div>
  </nav>
</header>
<!-- ========== END HEADER ========== -->

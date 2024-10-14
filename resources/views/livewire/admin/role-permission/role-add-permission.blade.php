<!-- Card Section -->
<div class="max-w-[85rem] px-4 py-6 sm:px-6  mx-auto">
    <div wire:loading style="color: #64d6e2" class="la-ball-clip-rotate-multiple la-3x preloader">
        <div></div>
        <div></div>
    </div>

    <!-- Card -->
    <div class="bg-white rounded-xl shadow p-4 sm:p-7 dark:bg-neutral-900">
        <form wire:submit="save">
            <!-- Section -->
            <div class="grid sm:grid-cols-12 gap-2 sm:gap-4 first:pt-0 last:pb-0 border-t first:border-transparent border-gray-200 dark:border-neutral-700 dark:first:border-transparent">
            <div class="sm:col-span-10">
                <h2 class="text-lg font-semibold text-black dark:text-neutral-200">
                    Add Role Permissions
                </h2>
            </div>
            <!-- End Col -->
            <div class="sm:col-span-2">
                <label for="select_all" class="flex p-3 w-full bg-white border border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400">
                    <span class="text-sm text-black dark:text-neutral-400">Select All</span>
                    <input wire:click="selectAll($event.target.checked)" type="checkbox" value="select_all" class="shrink-0 ms-auto mt-0.5 border-gray-200 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" id="select_all">
                </label>
            </div>

            </div>
            <!-- End Section -->



            <!-- Table -->
            <table class="min-w-full divide-y my-2 divide-gray-200 dark:divide-neutral-700">
                <thead class="bg-gray-50 divide-y divide-gray-200 dark:bg-neutral-800 dark:divide-neutral-700">
                    <tr>
                    <th scope="col" class="px-6 py-3 text-start border-s border-gray-200 dark:border-neutral-700">
                        <span class="text-xs font-semibold uppercase tracking-wide text-black dark:text-neutral-200">
                        Module
                        </span>
                    </th>

                    <th scope="col" class="px-6 py-3 text-start border-s border-gray-200 dark:border-neutral-700">
                        <span class="text-xs font-semibold uppercase tracking-wide text-black dark:text-neutral-200">
                        Permissions
                        </span>
                    </th>



                    </tr>
                </thead>

                <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">

                    @if (!empty($module_permissions))

                        @foreach ($module_permissions as $module => $module_permissions)


                            <tr>
                                <td class="h-px w-auto whitespace-nowrap" >
                                    <div class="px-6 py-2">
                                        <span class="text-sm text-black dark:text-neutral-200">
                                            {{ $module }}
                                        </span>
                                    </div>
                                </td>

                                <td class="h-px w-auto whitespace-nowrap" >
                                    <div class="px-6 py-2">

                                        <div class="grid sm:grid-cols-4 gap-2">

                                            @if(!empty($module_permissions) && count($module_permissions) > 0)
                                                @foreach ($module_permissions as $permission)
                                                    <label for="{{ $permission->name }}" class="flex p-3 w-full bg-white border border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400">
                                                        <span class="text-sm text-black dark:text-neutral-400">{{ $permission->name }}</span>
                                                        <input wire:model="selected_permissions" type="checkbox" value="{{ $permission->id }}" class="shrink-0 ms-auto mt-0.5 border-gray-200 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" id="{{ $permission->name }}">
                                                    </label>
                                                @endforeach
                                            @endif

                                        </div>

                                    </div>
                                </td>

                            </tr>

                        @endforeach


                    @else

                        <tr>
                            <td class="h-px w-auto whitespace-nowrap" >
                                <div class="px-6 py-2">
                                    <span class="text-sm text-black dark:text-neutral-200">No records found</span>
                                </div>
                            </td>

                        </tr>
                    @endif

                </tbody>
            </table>
            <!-- End Table -->





            <a href="{{ route('roles.index') }}" class="w-auto py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-red-600 text-white hover:bg-red-700 focus:outline-none focus:bg-red-700 disabled:opacity-50 disabled:pointer-events-none">
                Cancel
            </a>
            <button type="submmit" class="w-auto py-3 px-4 inline-flex justify-center items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
            Save
            </button>


        </form>
    </div>
    <!-- End Card -->
  </div>
  <!-- End Card Section -->

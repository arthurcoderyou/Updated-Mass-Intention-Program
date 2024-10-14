<!-- Table Section -->
<div class="max-w-full px-4 py-6 sm:px-6  mx-auto">
    <!-- Card -->
    <div class="flex flex-col">
      <div class="-m-1.5 overflow-x-auto">
        <div class="p-1.5 min-w-full inline-block align-middle">
          <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden dark:bg-neutral-900 dark:border-neutral-700">
            <!-- Header -->
            <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-neutral-700">
              <div>
                <h2 class="text-xl font-semibold text-black dark:text-neutral-200">
                  Mass intentions
                </h2>
                <p class="text-sm text-black dark:text-neutral-400">
                  Listing of Mass intentions
                </p>
              </div>

              <div>
                <div class="inline-flex gap-x-2">
                  {{-- <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-black shadow-sm
                  hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" href="#">
                    View all
                  </a> --}}


                    <div class="sm:col-span-1">
                        <label for="start_date" class="inline-block text-sm font-medium text-black mt-2.5 dark:text-neutral-500 py-1 ">
                            From:
                        </label>
                    </div>

                    <div class="sm:col-span-1">
                        <input id="start_date" type="date" name="start_date" wire:model.live="start_date"
                        class="py-3 px-2  block w-22 border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600

                        ">

                        @error('start_date')
                            <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                        @enderror

                    </div>
                    <!-- End Col -->


                    <div class="sm:col-span-1">
                        <label for="end_date" class="inline-block text-sm font-medium text-black mt-2.5 dark:text-neutral-500 py-1 ">
                            Until:
                        </label>
                    </div>

                    <div class="sm:col-span-1">
                        <input id="end_date" type="date" name="end_date" wire:model.live="end_date"
                        class="py-3 px-2  block w-22 border-gray-200 shadow-sm text-sm rounded-lg focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600

                        ">

                        @error('end_date')
                            <p class="text-sm text-red-600 mt-2">{{ $message }}</p>
                        @enderror

                    </div>
                    <!-- End Col -->



                <div class="max-w-sm space-y-3">

                    <input type="text" wire:model.live="search"
                    class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                    placeholder="Search">


                </div>

                <div class="max-w-sm space-y-3">

                    <select wire:model.live="sort_by"
                    class="py-3 px-4 pe-9 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                        <option selected value="">Sort by</option>
                        <option value="priority_asc">Highest Priority</option>
                        <option value="priority_desc">Lowest Priority</option>
                        <option value="intention_name_asc">Intention Name A - Z</option>
                        <option value="intention_name_desc">Intention Name Z - A</option>
                        <option value="created_desc">Latest Created</option>
                        <option value="created_asc">Oldest Created</option>
                        <option value="updated_desc">Latest Updated</option>
                        <option value="updated_asc">Oldest Updated</option>
                    </select>


                </div>


                <div class="max-w-24 w-auto space-y-3">

                    <select wire:model.live="record_count"
                    class="py-3 px-4 pe-9 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                        <option selected value="10">10</option>
                        <option value="25">25</option>
                        <option value="50">50</option>
                        <option value="100">100</option>
                        <option value="200">200</option>
                        <option value="500">500</option>
                    </select>


                </div>


                {{-- <div class="hs-dropdown relative [--placement:bottom-right] inline-block" data-hs-dropdown-auto-close="inside">
                    <button id="hs-as-table-table-filter-dropdown" type="button" class="py-3 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-black shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                        <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"/><path d="M7 12h10"/><path d="M10 18h4"/></svg>
                        Days
                        <span class="ps-2 text-xs font-semibold text-blue-600 border-s border-gray-200 dark:border-neutral-700 dark:text-blue-500">
                            {{ !empty($selected_days_of_the_week_count) ? $selected_days_of_the_week_count : 0}}
                        </span>
                    </button>
                    <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden divide-y divide-gray-200 min-w-48 z-10 bg-white shadow-md rounded-lg mt-2 dark:divide-neutral-700 dark:bg-neutral-800 dark:border dark:border-neutral-700" role="menu" aria-orientation="vertical" aria-labelledby="hs-as-table-table-filter-dropdown">
                        <div class="divide-y divide-gray-200 dark:divide-neutral-700">
                            <label for="hs-as-filters-dropdown-all" class="flex py-2.5 px-3">
                                <input wire:click="selectAllDays($event.target.checked)"
                                type="checkbox" class="shrink-0 mt-0.5 border-gray-300 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" id="hs-as-filters-dropdown-all" checked>
                                <span class="ms-3 text-sm text-black dark:text-neutral-200">All</span>
                            </label>

                            @if(!empty($days_of_the_week) && count($days_of_the_week) > 0 )
                                @foreach ($days_of_the_week as $day)

                                    <label for="hs-as-filters-dropdown-paid" class="flex py-2.5 px-3">
                                        <input value="{{ $day->id }}" type="checkbox" wire:model.live="selected_days_of_the_week"
                                        class="shrink-0 mt-0.5 border-gray-300 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" id="hs-as-filters-dropdown-paid">
                                        <span class="ms-3 text-sm text-black dark:text-neutral-200">{{ $day->name }}</span>
                                    </label>

                                @endforeach


                            @endif

                        </div>
                    </div>
                </div> --}}

                <div class="hs-tooltip inline-block" title="If this button is not clickable, please reload page">
                    <button type="button" class="hs-collapse-toggle py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-slate-600 text-white hover:bg-slate  -700 focus:outline-none focus:bg-slate-700 disabled:opacity-50 disabled:pointer-events-none" id="hs-basic-collapse" aria-expanded="false" aria-controls="hs-basic-collapse-heading" data-hs-collapse="#hs-basic-collapse-heading">
                        Day
                        <svg class="hs-collapse-open:rotate-180 shrink-0 size-4 text-white" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                        <path d="m6 9 6 6 6-6"></path>
                        </svg>
                    </button>
                    <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded shadow-sm dark:bg-neutral-700" role="tooltip">
                        If this button is not clickable, please reload page
                     </span>
                 </div>

                <div class="hs-tooltip inline-block"  title="If this button is not clickable, please reload page">
                    <div class="hs-dropdown relative [--placement:bottom-right] inline-block" data-hs-dropdown-auto-close="inside">
                        <button id="hs-as-table-table-filter-dropdown" type="button" class="py-3 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-gray-200 bg-white text-black shadow-sm hover:bg-gray-50 focus:outline-none focus:bg-gray-50 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:text-white dark:hover:bg-neutral-700 dark:focus:bg-neutral-700" aria-haspopup="menu" aria-expanded="false" aria-label="Dropdown">
                            <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M3 6h18"/><path d="M7 12h10"/><path d="M10 18h4"/></svg>
                            Type
                            <span class="ps-2 text-xs font-semibold text-blue-600 border-s border-gray-200 dark:border-neutral-700 dark:text-blue-500">
                                {{ !empty($selected_intention_types_count) ? $selected_intention_types_count : 0}}
                            </span>
                        </button>
                        <div class="hs-dropdown-menu transition-[opacity,margin] duration hs-dropdown-open:opacity-100 opacity-0 hidden divide-y divide-gray-200 min-w-48 z-10 bg-white shadow-md rounded-lg mt-2 dark:divide-neutral-700 dark:bg-neutral-800 dark:border dark:border-neutral-700" role="menu" aria-orientation="vertical" aria-labelledby="hs-as-table-table-filter-dropdown">
                            <div class="divide-y divide-gray-200 dark:divide-neutral-700">
                                <label for="hs-as-filters-dropdown-all" class="flex py-2.5 px-3">
                                    <input wire:click="selectAll($event.target.checked)"
                                    type="checkbox" class="shrink-0 mt-0.5 border-gray-300 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" id="hs-as-filters-dropdown-all" checked>
                                    <span class="ms-3 text-sm text-black dark:text-neutral-200">All</span>
                                </label>

                                @if(!empty($intention_types) && count($intention_types) > 0 )
                                    @foreach ($intention_types as $type)

                                        <label for="hs-as-filters-dropdown-paid" class="flex py-2.5 px-3">
                                            <input value="{{ $type->id }}" type="checkbox" wire:model.live="selected_intention_types"
                                            class="shrink-0 mt-0.5 border-gray-300 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" id="hs-as-filters-dropdown-paid">
                                            <span class="ms-3 text-sm text-black dark:text-neutral-200">{{ $type->name }}</span>
                                        </label>

                                    @endforeach


                                @endif

                            </div>
                        </div>
                    </div>
                    <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded shadow-sm dark:bg-neutral-700" role="tooltip">
                        If this button is not clickable, please reload page
                     </span>
                 </div>



                 @if(Auth::user()->hasRole('Super Admin') || Auth::user()->can('mass_intention create'))
                  <a class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-customBlue text-white hover:bg-customBlue focus:outline-none focus:bg-customBlue disabled:opacity-50 disabled:pointer-events-none"
                  href="{{ route('mass_intentions.create') }}">
                    <svg class="shrink-0 size-4" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M5 12h14"/><path d="M12 5v14"/></svg>
                    Create
                  </a>
                  @endif



                </div>
              </div>





            </div>
            <!-- End Header -->

            <!-- Day options-->
                <div id="hs-basic-collapse-heading" class="hs-collapse {{ !empty($selected_days_of_the_week) ? '' : 'hidden' }} w-full overflow-hidden transition-[height] duration-100 px-6 py-4 " aria-labelledby="hs-basic-collapse">
                    <div class="">
                        <div class="grid sm:grid-cols-8 gap-2">


                            <label for="hs-checkbox-in-form"
                            class="flex p-3 w-full bg-white border border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400">
                                <input  wire:click="selectAllDays($event.target.checked)" type="checkbox"
                                class="shrink-0 mt-0.5 border-gray-200 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" id="hs-checkbox-in-form">
                                <span class="text-sm text-black ms-3 dark:text-neutral-400">All</span>
                            </label>

                            @if(!empty($days_of_the_week) && count($days_of_the_week) > 0 )
                                @foreach ($days_of_the_week as $day)


                                    <label for="{{ $day->id }}"
                                    class="flex p-3 w-full bg-white border border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400">
                                        <input wire:model.live="selected_days_of_the_week"
                                        value="{{ $day->id }}" type="checkbox"
                                        class="shrink-0 mt-0.5 border-gray-200 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-800 dark:border-neutral-700 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" id="{{ $day->id }}">
                                        <span class="text-sm text-black ms-3 dark:text-neutral-400">{{ $day->name }}</span>
                                    </label>

                                @endforeach


                            @endif

                        </div>
                    </div>
                </div>
            <!-- ./Day options -->

            <!-- Table -->
            <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
              <thead class="bg-gray-50 divide-y divide-gray-200 dark:bg-neutral-800 dark:divide-neutral-700">
                <tr>

                    <th scope="col" class="px-6 py-3 text-start border-s border-gray-200 dark:border-neutral-700">
                        <div class="hs-tooltip [--placement:top] inline-block">
                            <span class="text-xs font-semibold uppercase tracking-wide text-black dark:text-neutral-200">
                                Priority
                            </span>
                            <span class=" max-w-[20rem] text-wrap hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-2 px-3 bg-gray-900 text-xs font-medium text-white rounded shadow-sm dark:bg-neutral-700" role="tooltip">
                                <span class="font-bold text-blue-300">Priority</span> <br>
                                <span>100 -> HIGHEST PRIOTITY </span> <br>
                                <span>0 -> LOWEST PRIOTITY </span> <br>
                                <span class="text-sky-200">Give higher priority on the values that you want to be displayed at the top</span>

                            </span>
                        </div>
                    </th>

                    {{-- <th scope="col" class="px-6 py-3 text-start border-s border-gray-200 dark:border-neutral-700">

                        <span class="text-xs font-semibold uppercase tracking-wide text-black dark:text-neutral-200">
                            Status
                        </span>
                    </th> --}}

                    <th scope="col" class="px-6 py-3 text-start border-s border-gray-200 dark:border-neutral-700">
                        <div class="hs-tooltip [--placement:top] inline-block">
                            <span class="text-xs font-semibold uppercase tracking-wide text-black dark:text-neutral-200">
                                Contact
                            </span>
                            <span class=" max-w-[20rem] text-wrap hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-2 px-3 bg-gray-900 text-xs font-medium text-white rounded shadow-sm dark:bg-neutral-700" role="tooltip">
                                <span class="font-bold text-blue-300">Contact Information</span> <br>
                                <span>Contact Name </span> <hr class="bg-customBlue h-1">
                                <span>Contact Info </span> <br>
                                <span class="text-sky-200">To top part display the contact name and the bottom part displays the contact info</span>

                            </span>
                        </div>
                    </th>



                    <th scope="col" class="px-6 py-3 text-start border-s border-gray-200 dark:border-neutral-700 text-nowrap">
                        <span class="text-xs font-semibold uppercase tracking-wide text-black dark:text-neutral-200">
                        Intention Name
                        </span>
                    </th>

                    <th scope="col" class="px-6 py-3 text-start border-s border-gray-200 dark:border-neutral-700 text-nowrap">
                        <span class="text-xs font-semibold uppercase tracking-wide text-black dark:text-neutral-200">
                        Intention Type
                        </span>
                    </th>

                    <th scope="col" class="px-6 py-3 text-start border-s border-gray-200 dark:border-neutral-700">
                        <span class="text-xs font-semibold uppercase tracking-wide text-black dark:text-neutral-200">
                        Date
                        </span>
                    </th>

                    <th scope="col" class="px-6 py-3 text-start border-s border-gray-200 dark:border-neutral-700">
                        <span class="text-xs font-semibold uppercase tracking-wide text-black dark:text-neutral-200">
                        Requested Times
                        </span>
                    </th>


                    <th scope="col" class="px-6 py-3 text-end border-s border-gray-200 dark:border-neutral-700">
                        <span class="text-xs font-semibold uppercase tracking-wide text-black dark:text-neutral-200">
                        Action
                        </span>
                    </th>
                </tr>
              </thead>

              <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                @if(!empty($mass_intentions) && count($mass_intentions) > 0)
                    @foreach ($mass_intentions as $mass_intention)

                        <tr>
                            <td class="h-px w-auto whitespace-nowrap">
                                <div class="px-6 py-2">
                                    <span class="text-sm text-black dark:text-neutral-200">
                                        {{ !empty($mass_intention->priority) ? $mass_intention->priority : 0 }}
                                    </span>
                                </div>
                            </td>

                            <td class="h-px w-auto whitespace-nowrap">
                                <div class="px-6 py-2">
                                    <span class="text-sm text-black dark:text-neutral-200">
                                        {{ $mass_intention->contact_name }} <hr class="bg-customBlue h-1">
                                        {{ $mass_intention->contact_info }}
                                    </span>
                                </div>
                            </td>

                            <td class="h-px w-auto whitespace-nowrap text-wrap">
                                <div class="px-6 py-2">
                                    <span class="text-sm text-black dark:text-neutral-200">{{ $mass_intention->intention_name }}</span>
                                </div>
                            </td>

                            <td class="h-px w-auto whitespace-nowrap">
                                <div class="px-6 py-2">
                                    <span class="text-sm text-black dark:text-neutral-200">{{ $mass_intention->type->name }} </span>
                                </div>
                            </td>

                            <td class="h-px w-auto whitespace-nowrap">
                                <div class="px-6 py-2">
                                    <span class="text-sm text-black dark:text-neutral-200">
                                        FROM: {{ date("d/m/Y",strtotime($mass_intention->start_date) ) }} - {{ \Carbon\Carbon::parse($mass_intention->start_date)->toFormattedDateString() }} <br>
                                        UNTIL: {{ date("d/m/Y",strtotime($mass_intention->end_date  ) ) }} - {{ \Carbon\Carbon::parse($mass_intention->end_date)->toFormattedDateString()   }}
                                    </span>
                                </div>
                            </td>



                            <td class="h-px w-auto whitespace-nowrap">
                                <div class="px-6 py-2">
                                    <span class="text-sm text-black dark:text-neutral-200  ">

                                            <!--- time_options -->
                                            @if(!empty($mass_intention->time_options))
                                                @foreach ($mass_intention->time_options as $time_option)

                                                    <!--   Time option  -->
                                                    @if(!empty($time_option->request_time_option) && $time_option->status == 0)

                                                        <span class=" font-bold">
                                                            {{ date("H:i A",strtotime($time_option->request_time_option->time))  }}
                                                        </span>


                                                        <!-- Time option days -->
                                                        @if(!empty($time_option->request_time_option->days))
                                                            @foreach ($time_option->request_time_option->days as $day_data)

                                                                <span>{{ $day_data->day->name }}</span>
                                                            @endforeach
                                                        @endif

                                                        <br>

                                                    @endif

                                                @endforeach
                                            @endif

                                    </span>
                                </div>
                            </td>

                            <td class="h-px w-auto whitespace-nowrap text-end">
                                <div class="px-6 py-2">
                                    @if(Auth::user()->hasRole('Super Admin') || Auth::user()->can('mass_intention edit'))
                                    <a type="button" href="{{ route('mass_intentions.edit',['mass_intention' => $mass_intention->id]) }}"
                                    class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-blue-600 text-white hover:bg-blue-700 focus:outline-none focus:bg-blue-700 disabled:opacity-50 disabled:pointer-events-none">
                                        Edit
                                    </a>
                                    @endif


                                    @if(Auth::user()->hasRole('Super Admin') || Auth::user()->can('mass_intention delete'))
                                    <a href="javascript:void(0)"
                                    onclick="confirm('Are you sure, you want to delete this record?') || event.stopImmediatePropagation()"
                                    wire:click.prevent="deleteMassIntention({{ $mass_intention->id }})"
                                    class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-red-600 text-white hover:bg-red-700 focus:outline-none focus:bg-red-700 disabled:opacity-50 disabled:pointer-events-none"  >
                                        Delete
                                    </a>
                                    @endif




                                </div>
                            </td>


                        </tr>
                    @endforeach
                @else
                    <tr>
                        <td class="h-px w-auto whitespace-nowrap" colspan="3">
                            <div class="px-6 py-2">
                                <span class="text-sm text-black dark:text-neutral-200">No records found</span>
                            </div>
                        </td>
                    </tr>
                @endif
              </tbody>
            </table>
            <!-- End Table -->

            <!-- Footer -->
            <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-t border-gray-200 dark:border-neutral-700">

              {{ $mass_intentions->links() }}
            </div>
            <!-- End Footer -->
          </div>
        </div>
      </div>
    </div>
    <!-- End Card -->
  </div>
  <!-- End Table Section -->

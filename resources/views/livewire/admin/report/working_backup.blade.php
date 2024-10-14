<!-- Table Section -->
<div class="max-w-full px-4 py-6 sm:px-6  mx-auto">
    <div wire:loading style="color: #64d6e2" class="la-ball-clip-rotate-multiple la-3x preloader">
        <div></div>
        <div></div>
    </div>
    <!-- Card -->
    <div class="flex flex-col">
      <div class="-m-1.5 overflow-x-auto">
        <div class="p-1.5 min-w-full inline-block align-middle">
          <div class="bg-white border border-gray-200 rounded-xl shadow-sm overflow-hidden dark:bg-neutral-900 dark:border-neutral-700">
            <!-- Header -->
            <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-b border-gray-200 dark:border-neutral-700">
              <div>
                <h2 class="text-xl font-semibold text-black dark:text-neutral-200">
                  Mass Intention Report
                </h2>
                <p class="text-sm text-black dark:text-neutral-400">
                  Customize your report by filtering the records
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
                            {{-- <option value="priority_asc">Highest Priority</option>
                            <option value="priority_desc">Lowest Priority</option> --}}
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

                    <div class="hs-tooltip inline-block">
                        <button
                        type="button"
                        class="hs-collapse-toggle py-3 px-4 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-slate-600 text-white hover:bg-slate  -700 focus:outline-none focus:bg-slate-700 disabled:opacity-50 disabled:pointer-events-none"
                        id="hs-basic-collapse" aria-expanded="false" aria-controls="hs-basic-collapse-heading" data-hs-collapse="#hs-basic-collapse-heading">
                            Day
                            <svg class="hs-collapse-open:rotate-180 shrink-0 size-4 text-white" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round">
                            <path d="m6 9 6 6 6-6"></path>
                            </svg>
                        </button>
                        <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded shadow-sm dark:bg-neutral-700" role="tooltip">
                           If this button is not clickable, please reload page
                        </span>
                    </div>

                    <div class="hs-tooltip inline-block">
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
                                        type="checkbox" class="shrink-0 mt-0.5 border-gray-300 rounded text-blue-600 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-600 dark:checked:bg-blue-500 dark:checked:border-blue-500 dark:focus:ring-offset-gray-800" id="hs-as-filters-dropdown-all" >
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

                    @if(Auth::user()->hasRole('Super Admin') || Auth::user()->can('dashboard download_pdf'))

                        <div class="max-w-24 w-auto space-y-3">

                            <select wire:model.live="print_type"
                            class="py-3 px-4 pe-9 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                <option value="">Select Print Type</option>
                                <option value="list">List</option>
                                <option value="paragraph">Paragraph</option>
                            </select>


                        </div>


                        <button type="button" class="py-2 px-3 inline-flex items-center gap-x-2 text-sm font-medium rounded-lg border border-transparent bg-customBlue text-white hover:bg-customBlue focus:outline-none focus:bg-customBlue disabled:opacity-50 disabled:pointer-events-none"
                                wire:click="generatePdf">
                                <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" x2="12" y1="15" y2="3"/></svg>
                                PDF
                        </button>
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
                                        <span class="text-sm text-black ms-3 dark:text-neutral-400">{{ $day->id }} - {{ $day->name }}</span>
                                    </label>


                                @endforeach


                            @endif

                        </div>

                        <div class="grid sm:grid-cols-12 gap-1 mt-2">

                            <!-- Table -->
                            @if(!empty($days_of_the_week))
                                @foreach ($days_of_the_week as $week_day)


                                    @if(in_array($week_day->id, $selected_days_of_the_week))
                                        <!-- get all request_time_options_days -->
                                        @if(!empty($week_day->request_time_options_days))


                                            @php
                                                $request_time_options = App\Models\RequestTimeOption::getTimeRecords($week_day->id);
                                            @endphp

                                            @foreach($request_time_options as  $request_time_option)

                                                @php
                                                    $mass_intention_record_count = \App\Models\MassIntention::getRecordCount($request_time_option->id,$selected_days_of_the_week,$selected_intention_types,$search, $start_date, $end_date);

                                                @endphp

                                                @if($mass_intention_record_count > 0)


                                                    {{-- <div class="bg-blue-50">
                                                        <div colspan="6" class=" px-6 py-1 text-start border-s border-gray-50 dark:border-neutral-700">

                                                            <span class="text-sm font-semibold uppercase tracking-wide  text-black">
                                                                {{ !empty($request_time_option->time) ? date("h:i A",strtotime($request_time_option->time)) : '' }}
                                                            </span>

                                                        </div>
                                                    </div> --}}
                                                    @if(Auth::user()->hasRole('Super Admin') || Auth::user()->can('dashboard download_pdf'))
                                                    <button type="button" class="py-3 px-4 inline-flex items-center gap-x-2 text-xs font-medium rounded-lg border border-transparent bg-customBlue text-white hover:bg-customBlue focus:outline-none focus:bg-customBlue disabled:opacity-50 disabled:pointer-events-none" wire:click="generatePdf({{ $request_time_option->id }},{{ $week_day->id }})" >
                                                        <svg class="shrink-0 size-3.5" xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round"><path d="M21 15v4a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2v-4"/><polyline points="7 10 12 15 17 10"/><line x1="12" x2="12" y1="15" y2="3"/></svg>
                                                        {{-- PDF - {{ translate_day_name($week_day->name) }} {{ !empty($request_time_option->time) ? date("h:i A",strtotime($request_time_option->time)) : '' }} --}}

                                                        {{ translate_day_name($week_day->name) }} {{ !empty($request_time_option->time) ? date("h:i A",strtotime($request_time_option->time)) : '' }}
                                                    </button>
                                                    @endif

                                                @endif

                                            @endforeach
                                        @endif
                                    @endif
                                @endforeach
                            @endif

                        </div>


                    </div>
                </div>
            <!-- ./Day options -->

            <!-- Table -->
            @if(!empty($days_of_the_week))
                @foreach ($days_of_the_week as $week_day)


                    @if(in_array($week_day->id, $selected_days_of_the_week))
                        <div class="bg-customBlue">
                            <div colspan="6" class=" px-6 py-1 text-start border-s border-gray-200 dark:border-neutral-700">

                                <span class="text-sm font-semibold uppercase tracking-wide  text-neutral-200">
                                    {{ $week_day->name }}
                                </span>

                            </div>
                        </div>


                        <!-- get all request_time_options_days -->
                        @if(!empty($week_day->request_time_options_days))

                            @php
                                $request_time_options = App\Models\RequestTimeOption::getTimeRecords($week_day->id);
                            @endphp


                            @foreach($request_time_options as  $request_time_option)

                                @php
                                    $mass_intention_record_count = \App\Models\MassIntention::getRecordCount($request_time_option->id,$selected_days_of_the_week,$selected_intention_types,$search, $start_date, $end_date);

                                @endphp

                                @if($mass_intention_record_count > 0)


                                    <div class="bg-blue-50">
                                        <div colspan="6" class=" px-6 py-1 text-start border-s border-gray-50 dark:border-neutral-700">

                                            <span class="text-sm font-semibold uppercase tracking-wide  text-black">
                                                {{ !empty($request_time_option->time) ? date("h:i A",strtotime($request_time_option->time)) : '' }}
                                            </span>

                                        </div>
                                    </div>




                                    @if(!empty($intention_types) && count($intention_types) > 0 )

                                        @foreach ($intention_types as $intention_type)

                                            @if(in_array($intention_type->id, $selected_intention_types))


                                                @php
                                                    // record_count is 0, sortpriority
                                                    $prioritized_time_mass_intentions = \App\Models\MassIntention::getRecords($intention_type->id,$request_time_option->id, 0,$selected_days_of_the_week,$selected_intention_types,"priority_asc",$search, $start_date,$end_date,"PRIORITY_NOT_NULL");

                                                    $time_mass_intentions = \App\Models\MassIntention::getRecords($intention_type->id,$request_time_option->id, $record_count,$selected_days_of_the_week,$selected_intention_types,$sort_by,$search, $start_date,$end_date,"PRIORITY_NULL");
                                                @endphp

                                                @if((!empty($time_mass_intentions) && count($time_mass_intentions) > 0) || (!empty($prioritized_time_mass_intentions) && count($prioritized_time_mass_intentions) > 0))


                                                    @php
                                                        $next_priority = \App\Models\MassIntention::getNextPriority($intention_type->id);
                                                    @endphp

                                                    <div class="bg-customYellow">
                                                        <div colspan="6" class=" px-6 py-1 text-start border-s border-gray-200 dark:border-neutral-700">

                                                            <span class="text-sm font-semibold uppercase tracking-wide  text-white">
                                                                {{ !empty($intention_type->name) ? $intention_type->name : '' }}
                                                            </span>

                                                        </div>
                                                    </div>






                                                    <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                                                        <thead class="bg-gray-50 divide-y divide-gray-200 dark:bg-neutral-800 dark:divide-neutral-700">



                                                            <tr>
                                                                @if(Auth::user()->can('mass_intention edit'))
                                                                <th scope="col" class="px-6 py-3 text-start border-s border-gray-200 dark:border-neutral-700">
                                                                    <div class="hs-tooltip [--placement:top] inline-block">
                                                                        <span class="text-xs font-semibold uppercase tracking-wide text-black dark:text-neutral-200">
                                                                            Priority
                                                                        </span>
                                                                        <span class=" max-w-[20rem] text-wrap hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-2 px-3 bg-gray-900 text-xs font-medium text-white rounded shadow-sm dark:bg-neutral-700" role="tooltip">
                                                                            <span class="font-bold text-blue-300">Priority</span> <br>
                                                                            <span>1 -> HIGHEST PRIOTITY </span> <br>
                                                                            <span>100 -> LOWEST PRIOTITY </span> <br>
                                                                            <span class="text-sky-200">Give higher priority on the values that you want to be displayed at the top</span>

                                                                        </span>
                                                                    </div>
                                                                </th>
                                                                @endif

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
                                                                            <span>Contact Name </span> <hr class="bg-sky-500 h-1">
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


                                                                {{-- <th scope="col" class="px-6 py-3 text-end border-s border-gray-200 dark:border-neutral-700">
                                                                    <span class="text-xs font-semibold uppercase tracking-wide text-black dark:text-neutral-200">
                                                                    Action
                                                                    </span>
                                                                </th> --}}
                                                            </tr>
                                                        </thead>

                                                        <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">
                                                                @foreach ($prioritized_time_mass_intentions as $mass_intention)

                                                                    <tr>

                                                                        @if(Auth::user()->can('mass_intention edit'))
                                                                        <td class="h-px w-auto whitespace-nowrap">
                                                                            <div class="px-6 py-2">
                                                                                <span class="text-sm text-black dark:text-neutral-200">
                                                                                    {{-- {{ !empty($mass_intention->priority) ? $mass_intention->priority : 0 }} --}}
                                                                                    {{-- <div class="max-w-sm space-y-3">
                                                                                        <input type="number" name="priority" wire class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="This is placeholder">
                                                                                    </div> --}}



                                                                                    <div class="max-w-sm space-y-3">

                                                                                        @if(Auth::user()->can('mass_intention edit'))
                                                                                            {{-- <input type="number" id="priority_{{ $mass_intention->id }}"  wire:change="updatePriority({{ $mass_intention->id }}, $event.target.value)" value="{{ $mass_intention->priority ? $mass_intention->priority : 0 }}" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                                                            placeholder="{{ $mass_intention->priority }}"
                                                                                            min="0" max="100"> --}}
                                                                                            @if( $mass_intention->priority != null && $mass_intention->priority > 0 )
                                                                                            <div class="flex flex-row">


                                                                                                <button type="button" wire:click="updatePriority({{ $mass_intention->id }}, 0,{{ $intention_type->id }})" class="p-1 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" >
                                                                                                    <div class="hs-tooltip flex">

                                                                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M15 12H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                                                                        </svg>
                                                                                                        <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded shadow-sm dark:bg-neutral-700" role="tooltip">
                                                                                                            Remove from priority
                                                                                                        </span>
                                                                                                    </div>

                                                                                                </button>



                                                                                                <div class="flex flex-col">
                                                                                                    <button {{ $mass_intention->priority == 1 ? 'disabled' : '' }} type="button" wire:click="updatePriority({{ $mass_intention->id }}, {{ $mass_intention->priority - 1 }},{{ $intention_type->id }}, 'move_up')" class="p-1 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" >

                                                                                                        <div class="hs-tooltip flex">

                                                                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                                                                                <path stroke-linecap="round" stroke-linejoin="round" d="m15 11.25-3-3m0 0-3 3m3-3v7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                                                                            </svg>
                                                                                                            <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded shadow-sm dark:bg-neutral-700" role="tooltip">
                                                                                                                Move priority up
                                                                                                            </span>
                                                                                                        </div>


                                                                                                    </button>



                                                                                                    <button {{ $mass_intention->priority == $next_priority - 1 ? 'disabled' : '' }} type="button" wire:click="updatePriority({{ $mass_intention->id }}, {{ $mass_intention->priority + 1 }},{{ $intention_type->id }},'move_down')" class="p-1 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" >
                                                                                                        <div class="hs-tooltip flex">

                                                                                                            <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                                                                                <path stroke-linecap="round" stroke-linejoin="round" d="m9 12.75 3 3m0 0 3-3m-3 3v-7.5M21 12a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                                                                            </svg>
                                                                                                            <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded shadow-sm dark:bg-neutral-700" role="tooltip">
                                                                                                                Move priority down
                                                                                                            </span>
                                                                                                        </div>


                                                                                                    </button>

                                                                                                </div>


                                                                                                    <button type="button"  class="p-1 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600">
                                                                                                        {{ $mass_intention->priority ? $mass_intention->priority : 0 }}
                                                                                                    </button>

                                                                                            </div>

                                                                                            @else
                                                                                                <button type="button" wire:click="updatePriority({{ $mass_intention->id }},  {{ $next_priority }},{{ $intention_type->id }})"   class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" >
                                                                                                    <div class="hs-tooltip flex">

                                                                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                                                                            <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                                                                        </svg>
                                                                                                        <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded shadow-sm dark:bg-neutral-700" role="tooltip">
                                                                                                            Add to priority
                                                                                                        </span>

                                                                                                    </div>

                                                                                                </button>
                                                                                            @endif

                                                                                        @else
                                                                                            {{ $mass_intention->priority ? $mass_intention->priority : 0 }}
                                                                                        @endif
                                                                                    </div>

                                                                                </span>
                                                                            </div>
                                                                        </td>
                                                                        @endif

                                                                        <td class="h-px w-auto whitespace-nowrap">
                                                                            <div class="px-6 py-2">
                                                                                <span class="text-sm text-black dark:text-neutral-200">
                                                                                    {{ $mass_intention->contact_name }} <hr class="bg-sky-500 h-1">
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

                                                                                                    <!-- -->
                                                                                                    @if(!empty( $time_option->request_time_option->filterDaysByIds($selected_days_of_the_week) ) && !empty($selected_days_of_the_week))

                                                                                                        @foreach ($time_option->request_time_option->filterDaysByIds($selected_days_of_the_week) as $request_time)

                                                                                                            <span class=" font-bold">
                                                                                                                {{ date("H:i A",strtotime($request_time->request_time_option->time))  }}
                                                                                                            </span>


                                                                                                            <!-- Time option days -->
                                                                                                            @if(!empty($request_time->request_time_option->days))
                                                                                                                @foreach ($request_time->request_time_option->days as $day_data)

                                                                                                                    <span>{{ $day_data->day->name }}</span>
                                                                                                                @endforeach
                                                                                                            @endif

                                                                                                            <br>
                                                                                                        @endforeach

                                                                                                    @else


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

                                                                                                @endif

                                                                                            @endforeach
                                                                                        @endif

                                                                                </span>
                                                                            </div>
                                                                        </td>

                                                                    </tr>
                                                                @endforeach

                                                                @foreach ($time_mass_intentions as $mass_intention)

                                                                    <tr>

                                                                        @if(Auth::user()->can('mass_intention edit'))
                                                                        <td class="h-px w-auto whitespace-nowrap">
                                                                            <div class="px-6 py-2">
                                                                                <span class="text-sm text-black dark:text-neutral-200">
                                                                                    {{-- {{ !empty($mass_intention->priority) ? $mass_intention->priority : 0 }} --}}
                                                                                    {{-- <div class="max-w-sm space-y-3">
                                                                                        <input type="number" name="priority" wire class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="This is placeholder">
                                                                                    </div> --}}



                                                                                    <div class="max-w-sm space-y-3">

                                                                                        @if(Auth::user()->can('mass_intention edit'))
                                                                                            {{-- <input type="number" id="priority_{{ $mass_intention->id }}"  wire:change="updatePriority({{ $mass_intention->id }}, $event.target.value)" value="{{ $mass_intention->priority ? $mass_intention->priority : 0 }}" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                                                            placeholder="{{ $mass_intention->priority }}" --}}

                                                                                            <button type="button" wire:click="updatePriority({{ $mass_intention->id }},  {{ $next_priority }},{{ $intention_type->id }})"   class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" >
                                                                                                <div class="hs-tooltip flex">

                                                                                                    <svg xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" class="size-6">
                                                                                                        <path stroke-linecap="round" stroke-linejoin="round" d="M12 9v6m3-3H9m12 0a9 9 0 1 1-18 0 9 9 0 0 1 18 0Z" />
                                                                                                    </svg>
                                                                                                    <span class="hs-tooltip-content hs-tooltip-shown:opacity-100 hs-tooltip-shown:visible opacity-0 transition-opacity inline-block absolute invisible z-10 py-1 px-2 bg-gray-900 text-xs font-medium text-white rounded shadow-sm dark:bg-neutral-700" role="tooltip">
                                                                                                        Add to priority
                                                                                                    </span>

                                                                                                </div>

                                                                                            </button>

                                                                                        @else
                                                                                            {{ $mass_intention->priority ? $mass_intention->priority : 0 }}
                                                                                        @endif
                                                                                    </div>

                                                                                </span>
                                                                            </div>
                                                                        </td>
                                                                        @endif


                                                                        <td class="h-px w-auto whitespace-nowrap">
                                                                            <div class="px-6 py-2">
                                                                                <span class="text-sm text-black dark:text-neutral-200">
                                                                                    {{ $mass_intention->contact_name }} <hr class="bg-sky-500 h-1">
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

                                                                                                    <!-- -->
                                                                                                    @if(!empty( $time_option->request_time_option->filterDaysByIds($selected_days_of_the_week) ) && !empty($selected_days_of_the_week))

                                                                                                        @foreach ($time_option->request_time_option->filterDaysByIds($selected_days_of_the_week) as $request_time)

                                                                                                            <span class=" font-bold">
                                                                                                                {{ date("H:i A",strtotime($request_time->request_time_option->time))  }}
                                                                                                            </span>


                                                                                                            <!-- Time option days -->
                                                                                                            @if(!empty($request_time->request_time_option->days))
                                                                                                                @foreach ($request_time->request_time_option->days as $day_data)

                                                                                                                    <span>{{ $day_data->day->name }}</span>
                                                                                                                @endforeach
                                                                                                            @endif

                                                                                                            <br>
                                                                                                        @endforeach

                                                                                                    @else


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

                                                                                                @endif

                                                                                            @endforeach
                                                                                        @endif

                                                                                </span>
                                                                            </div>
                                                                        </td>

                                                                    </tr>
                                                                @endforeach


                                                        </tbody>
                                                    </table>

                                                    <!-- Footer -->
                                                    <div class="px-6 py-4 grid gap-3 md:flex md:justify-between md:items-center border-t border-gray-200 dark:border-neutral-700">
                                                        {{-- Showing 10 out of 5 0records --}}
                                                        {{ $time_mass_intentions->links() }}
                                                    </div>
                                                    <!-- End Footer -->

                                                @endif

                                            @endif

                                        @endforeach



                                    @endif


                                @endif

                            @endforeach




                        @endif
                    @endif


                @endforeach
            @endif
            <!-- End Table -->


          </div>
        </div>
      </div>
    </div>
    <!-- End Card -->
  </div>
  <!-- End Table Section -->



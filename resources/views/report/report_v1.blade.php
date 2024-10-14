<!DOCTYPE html>
<html>
<head>
    <title>Mass Intentions Report</title>
    <style>
        /* Add any styling you want for the PDF here */
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
    </style>
</head>
<body>
    <h1>Mass Intentions Report</h1>



    <!-- Table -->
    @if(!empty($days_of_the_week))
        @foreach ($days_of_the_week as $week_day)


            @if(in_array($week_day->id, $selected_days_of_the_week))
                <div class="bg-blue-400">
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


                        @if(!empty($intention_types) && count($intention_types) > 0)

                            @foreach ($intention_types as $intention_type)

                                @if(in_array($intention_type->id, $selected_intention_types))


                                    @php
                                        $time_mass_intentions = \App\Models\MassIntention::getRecords($intention_type->id,$request_time_option->id, 0,$selected_days_of_the_week,$selected_intention_types,$sort_by,$search, $start_date,$end_date);
                                    @endphp

                                    @if(!empty($time_mass_intentions) && count($time_mass_intentions) > 0)

                                        <div class="bg-blue-200">
                                            <div colspan="6" class=" px-6 py-1 text-start border-s border-gray-200 dark:border-neutral-700">

                                                <span class="text-sm font-semibold uppercase tracking-wide  text-black">
                                                    {{ !empty($intention_type->name) ? $intention_type->name : '' }}
                                                </span>

                                            </div>
                                        </div>


                                        <div class="bg-blue-50">
                                            <div colspan="6" class=" px-6 py-1 text-start border-s border-gray-50 dark:border-neutral-700">

                                                <span class="text-sm font-semibold uppercase tracking-wide  text-black">
                                                    {{ !empty($request_time_option->time) ? date("h:i A",strtotime($request_time_option->time)) : '' }}
                                                </span>

                                            </div>
                                        </div>



                                        <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-700">
                                            <thead class="bg-gray-50 divide-y divide-gray-200 dark:bg-neutral-800 dark:divide-neutral-700">



                                                <tr>

                                                    <th scope="col" class="px-6 py-3 text-start border-s border-gray-200 dark:border-neutral-700">
                                                        <div class="hs-tooltip [--placement:top] inline-block">
                                                            <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
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

                                                        <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                                                            Status
                                                        </span>
                                                    </th> --}}

                                                    <th scope="col" class="px-6 py-3 text-start border-s border-gray-200 dark:border-neutral-700">
                                                        <div class="hs-tooltip [--placement:top] inline-block">
                                                            <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
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
                                                        <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                                                        Intention Name
                                                        </span>
                                                    </th>

                                                    <th scope="col" class="px-6 py-3 text-start border-s border-gray-200 dark:border-neutral-700 text-nowrap">
                                                        <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                                                        Intention Type
                                                        </span>
                                                    </th>

                                                    <th scope="col" class="px-6 py-3 text-start border-s border-gray-200 dark:border-neutral-700">
                                                        <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                                                        Date
                                                        </span>
                                                    </th>

                                                    <th scope="col" class="px-6 py-3 text-start border-s border-gray-200 dark:border-neutral-700">
                                                        <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                                                        Requested Times
                                                        </span>
                                                    </th>


                                                    {{-- <th scope="col" class="px-6 py-3 text-end border-s border-gray-200 dark:border-neutral-700">
                                                        <span class="text-xs font-semibold uppercase tracking-wide text-gray-800 dark:text-neutral-200">
                                                        Action
                                                        </span>
                                                    </th> --}}
                                                </tr>
                                            </thead>

                                            <tbody class="divide-y divide-gray-200 dark:divide-neutral-700">


                                                    @foreach ($time_mass_intentions as $mass_intention)

                                                        <tr>
                                                            <td class="h-px w-auto whitespace-nowrap">
                                                                <div class="px-6 py-2">
                                                                    <span class="text-sm text-gray-800 dark:text-neutral-200">
                                                                        {{-- {{ !empty($mass_intention->priority) ? $mass_intention->priority : 0 }} --}}
                                                                        {{-- <div class="max-w-sm space-y-3">
                                                                            <input type="number" name="priority" wire class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600" placeholder="This is placeholder">
                                                                        </div> --}}
                                                                        <div class="max-w-sm space-y-3">
                                                                            <input type="number" id="priority_{{ $mass_intention->id }}"  wire:change="updatePriority({{ $mass_intention->id }}, $event.target.value)" value="{{ $mass_intention->priority ? $mass_intention->priority : 0 }}" class="py-3 px-4 block w-full border-gray-200 rounded-lg text-sm focus:border-blue-500 focus:ring-blue-500 disabled:opacity-50 disabled:pointer-events-none dark:bg-neutral-900 dark:border-neutral-700 dark:text-neutral-400 dark:placeholder-neutral-500 dark:focus:ring-neutral-600"
                                                                            placeholder="{{ $mass_intention->priority }}">
                                                                        </div>

                                                                    </span>
                                                                </div>
                                                            </td>

                                                            <td class="h-px w-auto whitespace-nowrap">
                                                                <div class="px-6 py-2">
                                                                    <span class="text-sm text-gray-800 dark:text-neutral-200">
                                                                        {{ $mass_intention->contact_name }} <hr class="bg-sky-500 h-1">
                                                                        {{ $mass_intention->contact_info }}
                                                                    </span>
                                                                </div>
                                                            </td>

                                                            <td class="h-px w-auto whitespace-nowrap text-wrap">
                                                                <div class="px-6 py-2">
                                                                    <span class="text-sm text-gray-800 dark:text-neutral-200">{{ $mass_intention->intention_name }}</span>
                                                                </div>
                                                            </td>

                                                            <td class="h-px w-auto whitespace-nowrap">
                                                                <div class="px-6 py-2">
                                                                    <span class="text-sm text-gray-800 dark:text-neutral-200">{{ $mass_intention->type->name }} </span>
                                                                </div>
                                                            </td>

                                                            <td class="h-px w-auto whitespace-nowrap">
                                                                <div class="px-6 py-2">
                                                                    <span class="text-sm text-gray-800 dark:text-neutral-200">
                                                                        FROM: {{ date("d/m/Y",strtotime($mass_intention->start_date) ) }} - {{ \Carbon\Carbon::parse($mass_intention->start_date)->toFormattedDateString() }} <br>
                                                                        UNTIL: {{ date("d/m/Y",strtotime($mass_intention->end_date  ) ) }} - {{ \Carbon\Carbon::parse($mass_intention->end_date)->toFormattedDateString()   }}
                                                                    </span>
                                                                </div>
                                                            </td>



                                                            <td class="h-px w-auto whitespace-nowrap">
                                                                <div class="px-6 py-2">
                                                                    <span class="text-sm text-gray-800 dark:text-neutral-200  ">

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



                                    @endif

                                @endif

                            @endforeach



                        @endif

                    @endforeach




                @endif
            @endif


        @endforeach
    @endif
    <!-- End Table -->



</body>
</html>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <?php
        $date_time_text = "";
        $date_time_text = date('l d/m/Y', strtotime(now())); // default is now

        if (!empty($start_date) && !empty($end_date)) {
            if ($start_date == $end_date) {
                $date_time_text = date('l d/m/Y', strtotime($start_date));
            } else {
                // Concatenate two date values correctly
                $date_time_text = date('l d/m/Y', strtotime($start_date)) . ' - ' . date('l d/m/Y', strtotime($end_date));
            }
        } else if (!empty($start_date)) {
            $date_time_text = date('l d/m/Y', strtotime($start_date));
        } else if (!empty($end_date)) {
            $date_time_text = date('l d/m/Y', strtotime($end_date));
        }
    ?>


    <title>Mass Intention Report - {{ $date_time_text }}</title>
    <style>



        /* Header and footer styles */
        @page {
            margin: 50px 40px;
            font-family: Arial, Helvetica, sans-serif;
        }

        header {
            position: fixed;
            top: -20px;
            left: 0px;
            right: 0px;
            height: 10px;
            text-align: left;
            color: gray;
            line-height: 3px;
            font-weight: bold;
        }

        footer {
            position: fixed;
            bottom: -20px;
            left: 0px;
            right: 0px;
            height: 10px;
            text-align: left;
            color: gray;
            line-height: 3px;
        }

        .content {
            margin-top: 0;
        }

        /* Page numbering */
        .page-number:before {
            content: "Page " counter(page) ;
        }


        body {
            font-family: Arial, sans-serif;
        }

        /* Timeline container */
        .timeline {
            position: relative;
            max-width: 100%;
            margin: 3px 0;
        }



        /* Individual timeline container */
        .timeline-item {
            padding: 3px 3px;
            position: relative;
            background-color: inherit;
            width: 100%;
        }


        /* Timeline content */
        .timeline-item-content {
            padding: 3px;
            background-color: white;
            position: relative;
            border-radius: 6px;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }

        /* Date text */
        .timeline-item .date {
            color: #007bff;
            font-weight: bold;
            font-size: 14px;
            margin-bottom: 5px;
        }

        /* Date text */
        .timeline-item .day {
            color: #000122;
            font-weight: bold;
            font-size: 14px;
            margin-bottom: 5px;
        }

        /* Timeline title */
        .timeline-item h3 {
            margin: 0;
            font-size: 18px;
            color: #333;
        }

        /* Timeline title */
        .timeline-item ul li  {
            font-size: 14px;
            color: #555;
            text-align: justify;
        }

        /* Timeline description */
        .timeline-item p {
            margin-top: 5px;
            font-size: 14px;
            color: #555;
            text-align: justify;
        }


        .text-center{
            text-align: center;
        }

    </style>
</head>
<body>

    <!-- Header -->
    <header style="font-weight: bolder">
        <small style="font-size: .9rem; font-weight: bolder; color: black;">Agana Cathedral</small>
        <hr style="background: black; ">
    </header>

    <!-- Footer -->
    <footer  style="font-weight: bolder">
        <hr style="background: black; ">
        <small style="font-size: .9rem; font-weight: bolder; color: black;" class="page-number"></small>
    </footer>

    <div class="conten">

        <!-- layout -->
        <div class="timeline">




            <!-- Title -->
            <div class=" ">
                <h2 style="text-align: center; font-weight: bold; line-height: 0.3rem">Mass Intentions Report</h2>
            </div>

            <p  style="text-align: center; font-size: 1.2rem; font-weight: bolder; line-height: 0.3rem">{{  $date_time_text }}</p>


            <!-- Timeline layout -->

                @if(!empty($days_of_the_week))
                    @foreach ($days_of_the_week as $week_day)


                        @php
                            /*Adjust the request_time_option to match if there is a selected request_time_option_id and day_id*/
                            if($day_id > 0){
                                //reset its values
                                $selected_days_of_the_week = [];
                                $selected_days_of_the_week[] = $day_id;

                            }
                        @endphp

                        @if(in_array($week_day->id, $selected_days_of_the_week))
                            <!-- time -->

                            {{-- <p  style="line-height: 0.3rem; font-weight: 900; text-align: center; ">{{ $week_day->name }} </p> --}}


                            <!-- get all request_time_options_days -->
                            @if(!empty($week_day->request_time_options_days))

                                @php
                                    /*Adjust the request_time_option to match if there is a selected request_time_option_id and day_id*/
                                    if($request_time_option_id > 0){
                                        $request_time_options = App\Models\RequestTimeOption::getTimeRecordsBySelectedId($request_time_option_id,$day_id);
                                    }else{
                                        $request_time_options = App\Models\RequestTimeOption::getTimeRecords($week_day->id);
                                    }

                                @endphp


                                @foreach($request_time_options as  $request_time_option)

                                    @php
                                        $mass_intention_record_count = \App\Models\MassIntention::getRecordCount($request_time_option->id,$selected_days_of_the_week,$selected_intention_types,$search, $start_date, $end_date);

                                    @endphp


                                    @if($mass_intention_record_count > 0)

                                        <!-- time -->

                                            <div style="text-align: center; font-size: 1.1rem; letter-spacing: .3px">
                                                {{ !empty($request_time_option->time) ? date("h:i A",strtotime($request_time_option->time)) : '' }}

                                                @if(!empty($request_time_option->days))
                                                    (
                                                        <small>
                                                            @foreach($request_time_option->days as $day)
                                                                {{ $day->day->name }}
                                                            @endforeach
                                                        </small>


                                                    )
                                                @endif
                                            </div>
                                            <hr style="background: black; ">


                                        @if(!empty($intention_types) && count($intention_types) > 0 )

                                            @foreach ($intention_types as $intention_type)

                                                @if(in_array($intention_type->id, $selected_intention_types))


                                                    @php

                                                        // record_count is 0, sortpriority
                                                        $prioritized_time_mass_intentions = \App\Models\MassIntention::getRecords($intention_type->id,$request_time_option->id, 0,$selected_days_of_the_week,$selected_intention_types,"priority_asc",$search, $start_date,$end_date,"PRIORITY_NOT_NULL");

                                                        $time_mass_intentions = \App\Models\MassIntention::getRecords($intention_type->id,$request_time_option->id, 0,$selected_days_of_the_week,$selected_intention_types,$sort_by,$search, $start_date,$end_date,"PRIORITY_NULL");
                                                    @endphp

                                                    @if((!empty($time_mass_intentions) && count($time_mass_intentions) > 0) || (!empty($prioritized_time_mass_intentions) && count($prioritized_time_mass_intentions) > 0))
                                                        <!-- intention type and mass intention names -->

                                                        <div style="  text-align: center; font-size: 1.3rem; font-weight: bolder;   letter-spacing: .3px">{{ !empty($intention_type->name) ? $intention_type->name : '' }}</div>

                                                        <div style="margin-bottom: 20px;" >



                                                            @if($print_type == "list")

                                                                    @foreach ($prioritized_time_mass_intentions as $mass_intention)

                                                                            <div style="text-align: center;   font-size: 1.1rem; letter-spacing: .3px">
                                                                                {{ $mass_intention->intention_name }}
                                                                            </div>

                                                                    @endforeach

                                                                    @foreach ($time_mass_intentions as $mass_intention)

                                                                            <div style="text-align: center; font-size: 1.1rem; letter-spacing: .3px">
                                                                                {{ $mass_intention->intention_name }}
                                                                            </div>

                                                                    @endforeach

                                                            @else
                                                                <div style="text-align: center; font-size: 1.1rem; letter-spacing: .3px">

                                                                    @foreach ($prioritized_time_mass_intentions as $mass_intention)

                                                                            {{ $mass_intention->intention_name }}

                                                                    @endforeach



                                                                </div>
                                                                <div style="text-align: center; font-size: 1.1rem; letter-spacing: .3px">


                                                                    @foreach ($time_mass_intentions as $mass_intention)

                                                                            {{ $mass_intention->intention_name }}

                                                                    @endforeach
                                                                </div>
                                                            @endif





                                                        </div>
                                                    @endif


                                                @endif
                                            @endforeach
                                        @endif

                                        <div style="opacity: 0; margin-bottom: 20px">.</div>

                                    @endif


                                @endforeach






                            @endif



                        @endif
                    @endforeach
                @endif





        </div>
        <!-- end of layout -->

    </div>

</body>
</html>






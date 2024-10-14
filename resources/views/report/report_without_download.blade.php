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


    </div>

</body>
</html>






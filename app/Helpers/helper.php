<?php

use App\Models\ActivityLogs;
use App\Models\MassIntention;
use App\Models\IntentionType;
use App\Models\RequestTimeOption;
use App\Models\User;
use Spatie\Permission\Models\Permission;
use Spatie\Permission\Models\Role;

if (!function_exists('capitalize')) {
    function capitalize($input)
    {
        return strtoupper($input);
    }
}


if (!function_exists('mass_intentions_count')) {
    function mass_intentions_count()
    {
        return MassIntention::count() > 0 ? MassIntention::count() : 0;
    }
}

if (!function_exists('request_time_option_count')) {
    function request_time_option_count()
    {
        return RequestTimeOption::count() > 0 ? RequestTimeOption::count() : 0;
    }
}

if (!function_exists('intention_type_count')) {
    function intention_type_count()
    {
        return IntentionType::count() > 0 ? IntentionType::count() : 0;
    }
}

if (!function_exists('user_count')) {
    function user_count()
    {
        return User::count() > 0 ? User::count() : 0;
    }
}


if (!function_exists('role_count')) {
    function role_count()
    {
        return Role::count() > 0 ? Role::count() : 0;
    }
}

if (!function_exists('permission_count')) {
    function permission_count()
    {
        return Permission::count() > 0 ? Permission::count() : 0;
    }
}

if (!function_exists('activity_logs_count')) {
    function activity_logs_count()
    {
        return ActivityLogs::count() > 0 ? ActivityLogs::count() : 0;
    }
}


if (!function_exists('day_color_converter')) {
    function day_color_converter($day)
    {
        $color = "";
        switch($day){
            case "Sunday":
                $color = "green";
                break;
            case "Monday":
                $color = "yellow";
                break;
            case "Tuesday":
                $color = "blue";
                break;
            case "Wednesday":
                $color = "violet";
                break;
            case "Thursday":
                $color = "yellow";
                break;
            case "Friday":
                $color = "pink";
                break;
            case "Saturday":
                $color = "emerald";
                break;
            default:
                $color = "gray";
                break;
        }

        return $color;
    }
}


if (!function_exists('get_enable_intention_types')) {
    function get_enable_intention_types()
    {
        return IntentionType::where('status', 1)->get();
    }
}


if (!function_exists('translate_day_name')) {
    function translate_day_name($day_name)
    {


        // Get the first 3 letters
        $firstThreeLetters = substr($day_name, 0, 3);

        // Capitalize the 3 letters
        $capitalized = strtoupper($firstThreeLetters);

        return $capitalized;



    }
}


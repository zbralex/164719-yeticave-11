<?php

function format_price($price)
{
    $ruble = '₽';


    if ($price < 1000) {
        return $price . $ruble;
    }

    if ($price >= 1000) {
        return number_format($price, 0, '', ' ') . $ruble;
    }
}


function get_dt_range($date)
{
    $current_date = date_create("now");
    $date = date_create($date);
    $remaining_time_arr = [];
    if ($current_date < $date) {
        $remaining_time = date_diff($date, $current_date);
        $remaining_days = date_interval_format($remaining_time, '%a');
        $remaining_hours = date_interval_format($remaining_time, '%h');
        $remaining_minutes = date_interval_format($remaining_time, '%i');
        $remaining_total_hours = $remaining_days * HOURS_PER_DAY + $remaining_hours;
        $remaining_time_arr = [
            'hours' => $remaining_total_hours,
            'minutes' => $remaining_minutes,
            'status' => true,
        ];
    } else {
        $remaining_time_arr = [
            'hours' => 0,
            'minutes' => 0,
            'status' => false,
        ];
    }

    return $remaining_time_arr;
}

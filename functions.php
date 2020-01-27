<?php

function get_lot_detail(object $connection, string $lotId)
{
    $sql_lot = 'SELECT *, l.name AS lot_name
                        FROM yeticave.lots l
                        JOIN yeticave.categories c ON c.id = l.category_id
                        WHERE l.id = ' .$lotId;


    $result_lot = mysqli_query($connection, $sql_lot);
    return mysqli_fetch_all($result_lot, MYSQLI_ASSOC);
}


function get_all_lots(object $connection): array
{
    $sql_lots = 'SELECT *, l.name AS lot_name, l.id AS lot_id
                        FROM yeticave.lots l
                        JOIN yeticave.categories c ON l.category_id = c.id 
                        WHERE l.end_date >= CURDATE() ORDER BY l.end_date ASC';
    $result_lots = mysqli_query($connection, $sql_lots);
    return mysqli_fetch_all($result_lots, MYSQLI_ASSOC);
}

function get_categories(object $connection): array
{
    $sql_categories = 'SELECT * FROM categories';
    $result_categories = mysqli_query($connection, $sql_categories);
    return mysqli_fetch_all($result_categories, MYSQLI_ASSOC);
}

function format_price(int $price): string
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

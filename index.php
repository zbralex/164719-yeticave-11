<?php
require_once('helpers.php');
//require_once('init.php');
$con = mysqli_connect("localhost", "newuser", "!MyNewPass1", "yeticave");
$is_auth = rand(0, 1);
$title = "Главная";
$user_name = 'Александр';
$categories = [];
$lots = [];
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
if ($con) {
    $sql_categories = 'SELECT * FROM categories';
    $result_categories = mysqli_query($con, $sql_categories);
    $categories = mysqli_fetch_all($result_categories, MYSQLI_ASSOC);


    $sql_lots = 'SELECT *, l.name AS lot_name
                FROM yeticave.lots l
                JOIN yeticave.categories c ON c.id = l.category_id';
    $result_lots = mysqli_query($con, $sql_lots);
    $lots = mysqli_fetch_all($result_lots, MYSQLI_ASSOC);
}

$page_content = include_template('main.php',
    [
        'categories' => $categories,
        'lots' => $lots
    ]
);
$layout = include_template('layout.php',
    [
        'title' => $title,
        'main' => $page_content,
        'is_auth' => $is_auth,
        'user_name' => $user_name,
        'categories' => $categories
    ]
);
print($layout);
?>

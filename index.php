<?php
require_once('helpers.php');
$is_auth = rand(0, 1);
$title = "Главная";
$user_name = 'Александр';
$categories = ["Доски и лыжи", "Крепления", "Ботинки", "Одежда", "Инструменты", "Разное"];
$goods = [
    [
        'name' => '2014 Rossignol District Snowboard',
        'category' => 'Доски и лыжи',
        'price' => '10999',
        'url' => 'img/lot-1.jpg',
        'expiration_date' => '2020-01-22'
    ],
    [
        'name' => 'DC Ply Mens 2016/2017 Snowboard',
        'category' => 'Доски и лыжи',
        'price' => '159999',
        'url' => 'img/lot-2.jpg',
        'expiration_date' => '2020-01-23'
    ],
    [
        'name' => 'Крепления Union Contact Pro 2015 года размер L/XL',
        'category' => 'Крепления',
        'price' => '8000',
        'url' => 'img/lot-3.jpg',
        'expiration_date' => '2020-01-24'
    ],
    [
        'name' => 'Ботинки для сноуборда DC Mutiny Charocal',
        'category' => 'Ботинки',
        'price' => '10999',
        'url' => 'img/lot-4.jpg',
        'expiration_date' => '2020-01-25'
    ],
    [
        'name' => 'Куртка для сноуборда DC Mutiny Charocal',
        'category' => 'Одежда',
        'price' => '7500',
        'url' => 'img/lot-5.jpg',
        'expiration_date' => '2020-01-26'
    ],
    [
        'name' => 'Маска Oakley Canopy',
        'category' => 'Разное',
        'price' => '5400',
        'url' => 'img/lot-6.jpg',
        'expiration_date' => '2020-01-27'
    ],
];
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


function get_dt_range($date) {
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


$page_content = include_template('main.php',
    [
        'categories' => $categories,
        'goods' => $goods
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

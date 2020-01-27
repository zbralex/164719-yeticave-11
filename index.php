<?php
require_once('helpers.php');
require_once ('functions.php');
require_once('init.php');

require ('lot.php');

$is_auth = rand(0, 1);
$title = "Главная";
$user_name = 'Александр';
$categories = [];
$lots = [];
$params = $_GET;

if ($con) {
    $categories = get_categories($con);
    $lots = get_all_lots($con);
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


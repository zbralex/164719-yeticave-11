<?php
require_once('helpers.php');
require_once ('functions.php');
require_once('init.php');

require ('lot.php');
require ('all_lots.php');

$isAuth = rand(0, 1);
$title = "Главная";
$userName = 'Александр';
$categories = [];
$lots = [];
$params = $_GET;
$mainPage = true;

if ($con) {
    $categories = get_categories($con);
    $lots = get_all_lots($con);
}

$pageContent = include_template('main.php',
    [
        'categories' => $categories,
        'lots' => $lots
    ]
);
$layout = include_template('layout.php',
    [
        'title' => $title,
        'main' => $pageContent,
        'isAuth' => $isAuth,
        'userName' => $userName,
        'categories' => $categories,
        'mainPage' => $mainPage
    ]
);
print($layout);



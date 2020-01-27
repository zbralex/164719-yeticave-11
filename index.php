<?php
require_once('helpers.php');
require_once ('functions.php');
require_once('init.php');

$is_auth = rand(0, 1);
$title = "Главная";
$user_name = 'Александр';
$categories = [];
$lots = [];

if ($con) {
    $sql_categories = 'SELECT * FROM categories';
    $result_categories = mysqli_query($con, $sql_categories);
    $categories = mysqli_fetch_all($result_categories, MYSQLI_ASSOC);


    $sql_lots = 'SELECT *, l.name AS lot_name
                FROM yeticave.lots l
                JOIN yeticave.categories c ON c.id = l.category_id
                WHERE l.end_date >= CURDATE() ORDER BY l.end_date ASC';
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

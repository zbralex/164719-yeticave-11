<?php
require_once ('init.php');
require_once ('functions.php');
require_once ('helpers.php');

$lots = [];
if(isset($_GET['pages'])) {
    $params['pages'] = filter_input(INPUT_GET, 'pages', FILTER_DEFAULT);
    $page_id = mysqli_real_escape_string($con, $_GET['pages']);

    if($con) {
        $lots = get_all_lots($con);
        $categories = get_categories($con);
        $lot_detail = get_lot_detail($con, $page_id);
    }
    $page_content = include_template('lot_template.php',
        [
            'categories' => $categories,
            'lots' => $lots,
            'lot_detail' => $lot_detail
        ]
    );
    $layout = include_template('layout.php',
        [
            'title' => '',
            'main' => $page_content,
            'is_auth' => true,
            'user_name' => 'user',
            'categories' => $categories,
        ]
    );
    print($layout);
    die();
}

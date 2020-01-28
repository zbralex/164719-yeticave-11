<?php

$lots = [];

if (isset($_GET['category'])) {

    $category_url = mysqli_real_escape_string($con, $_GET['category']);

    if($con) {
        $lots = get_all_lots($con);
        $categories = get_categories($con);
        $category_detail = get_category_detail($con, $category_url);


        $page_content = include_template('all_lots_template.php', [
            'categories' => $categories,
            'lots' => $lots
        ]);

        $layout = include_template('layout.php', [
            'title' => '',
            'main' => $page_content,
            'is_auth' => true,
            'user_name' => 'user',
            'categories' => $categories,
        ]);
        print ($layout);
        die();
    }
}

<?php

$lots = [];
$mainPage = true;
if (isset($_GET['category'])) {

    $category_url = mysqli_real_escape_string($con, $_GET['category']);

    if ($con) {
        $lots = get_all_lots($con);
        $categories = get_categories($con);
        $category_detail = get_category_detail($con, $category_url);

        if (empty($_GET)) {
            $page_content = include_template('error_404.php', []);
            $layout = include_template('layout.php',
                [
                    'title' => '404 ошибка',
                    'mainPage' => $mainPage,
                    'main' => $page_content,
                    'is_auth' => true,
                    'user_name' => 'user',
                    'categories' => $categories,
                ]
            );
            print($layout);
            die();
        }

        $pagination = include_template('pagination_template.php', [

        ]);

        $page_content = include_template('all_lots_template.php', [
            'categories' => $categories,
            'category_detail' => $category_detail,
            'pagination' => !empty($category_detail[0]['name']) ? $pagination : ''
        ]);

        $layout = include_template('layout.php', [
            'title' => !empty($category_detail[0]['name']),
            'main' => $page_content,
            'is_auth' => true,
            'user_name' => 'user',
            'categories' => $categories,
        ]);
        print ($layout);
        die();
    }
}

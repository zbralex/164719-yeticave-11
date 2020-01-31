<?php

$lots = [];
$mainPage = true;

if (isset($_GET['category'])) {

    $categoryUrl = mysqli_real_escape_string($con, $_GET['category']);

    if ($con) {
        $lots = get_all_lots($con);
        $categories = get_categories($con);
        $categoryDetail = get_category_detail($con, $categoryUrl);

        if (empty($_GET)) {
            $pageContent = include_template('error_404.php', []);
            $layout = include_template('layout.php',
                [
                    'title' => '404 ошибка',
                    'mainPage' => !$mainPage,
                    'main' => $pageContent,
                    'isAuth' => true,
                    'userName' => 'user',
                    'categories' => $categories,
                ]
            );
            print($layout);
            die();
        }

        $pagination = include_template('pagination_template.php', [

        ]);

        $pageContent = include_template('all_lots_template.php', [
            'categories' => $categories,
            'categoryDetail' => $categoryDetail,
            'pagination' => !empty($categoryDetail[0]['name']) ? $pagination : ''
        ]);

        $layout = include_template('layout.php', [
            'title' => !empty($categoryDetail[0]['name']) ? $categoryDetail[0]['name'] : '',
            'main' => $pageContent,
            'isAuth' => true,
            'userName' => 'user',
            'categories' => $categories,
        ]);
        print ($layout);
        die();
    }
}

<?php

$lots = [];
$lot_name = '';
$mainPage = true;
if(isset($_GET['pages'])) {
    $params['pages'] = filter_input(INPUT_GET, 'pages', FILTER_DEFAULT);
    $pageId = mysqli_real_escape_string($con, $_GET['pages']);

    if($con) {
        $lots = get_all_lots($con);
        $categories = get_categories($con);
        $lotDetail = get_lot_detail($con, $pageId);

        if(empty($lotDetail)) {
            header('HTTP/1.0 404 Not Found');
            $pageContent = include_template('error_404.php', [

            ]);
            $layout = include_template('layout.php',
                [
                    'title' => '404 ошибка',
                    'mainPage' => $mainPage,
                    'main' => $pageContent,
                    'isAuth' => true,
                    'userName' => 'user',
                    'categories' => $categories,
                ]
            );
            print($layout);
            die();
        }
    }


    $pageContent = include_template('lot_template.php',
        [
            'categories' => $categories,
            'lots' => $lots,
            'lotDetail' => $lotDetail
        ]
    );
    $layout = include_template('layout.php',
        [
            'title' => !empty($lotDetail[0]['lot_name']) ? $lotDetail[0]['lot_name'] : '',
            'main' => $pageContent,
            'isAuth' => true,
            'userName' => 'user',
            'categories' => $categories,
        ]
    );
    print($layout);
    die();
}

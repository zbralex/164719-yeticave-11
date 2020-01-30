<?php

function get_lot_detail(object $connection, string $lotId)
{
    $whereLotID = ' WHERE l.id = ' . $lotId;
    if (empty($lotId)) {
        $whereLotID = '';
    }
    $sqlLot = 'SELECT l.img, l.category_id, l.end_date, l.description, l.name AS lot_name, c.name
                        FROM yeticave.lots l
                        JOIN yeticave.categories c ON c.id = l.category_id ' . $whereLotID;

    $resultLot = mysqli_query($connection, $sqlLot);
    return mysqli_fetch_all($resultLot, MYSQLI_ASSOC);
}


function get_all_lots(object $connection): array
{
    $sqlLots = 'SELECT *, l.name AS lot_name, l.id AS lot_id
                        FROM yeticave.lots l
                        JOIN yeticave.categories c ON l.category_id = c.id 
                        WHERE l.end_date >= CURDATE() ORDER BY l.end_date ASC';
    $resultLots = mysqli_query($connection, $sqlLots);
    return mysqli_fetch_all($resultLots, MYSQLI_ASSOC);
}

function get_categories(object $connection): array
{
    $sqlCategories = 'SELECT * FROM categories';
    $resultCategories = mysqli_query($connection, $sqlCategories);
    return mysqli_fetch_all($resultCategories, MYSQLI_ASSOC);
}

function get_category_detail(object $connection, string $categoryUrl): array
{
    $sqlCategoryDetail = "SELECT *, l.name AS lot_name, l.id AS lot_id
                            FROM yeticave.lots l
                            JOIN yeticave.categories c ON l.category_id = c.id 
                            WHERE l.end_date >= CURDATE() AND c.symbol_code = "
        . " '" . $categoryUrl . "' "
        . " ORDER BY l.end_date ASC";
    $resultCategoryDetail = mysqli_query($connection, $sqlCategoryDetail);
    return mysqli_fetch_all($resultCategoryDetail, MYSQLI_ASSOC);
}

function format_price(int $price): string
{
    if ($price < 1000) {
        return $price;
    }

    if ($price >= 1000) {
        return number_format($price, 0, '', ' ');
    }
}

//
//function get_dt_range($date)
//{
//    $currentDate = date_create("now");
//    $date = date_create($date);
//    $remainingTimeArr = [];
//    if ($currentDate < $date) {
//        $remainingTime = date_diff($date, $currentDate);
//        $remainingDays = date_interval_format($remainingTime, '%a');
//        $remainingHours = date_interval_format($remainingTime, '%h');
//        $remainingMinutes = date_interval_format($remainingTime, '%i');
//        $remainingTotalHours = $remainingDays * HOURS_PER_DAY + $remainingHours;
//        $remainingTimeArr = [
//            'hours' => $remainingTotalHours,
//            'minutes' => $remainingMinutes,
//            'status' => true,
//        ];
//    } else {
//        $remainingTimeArr = [
//            'hours' => 0,
//            'minutes' => 0,
//            'status' => false,
//        ];
//    }
//
//    return $remainingTimeArr;
//}
function get_dt_range($date)
{
    $check_time = strtotime($date) - time();

    if ($check_time <= 0) {
        return false;
    }

    $days = floor($check_time / 86400);

    $hours = floor(($check_time % 86400) / 3600);

    $minutes = floor(($check_time % 3600) / 60);

    $seconds = $check_time % 60;
}

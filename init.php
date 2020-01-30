<?php

ini_set('error_reporting', E_ALL);
ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
$title = '';
$con = mysqli_connect("localhost", "newuser", "!MyNewPass1", "yeticave");

if (!$con) {
    print("Ошибка подключения: " . mysqli_connect_error());
    header("HTTP/1.0 500 Internal Server Error");
    die;
}

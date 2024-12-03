<?php

require_once "config.php";
$connect = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD, DB_NAME);
if (mysqli_connect_error()) {
    echo 'Ошибка подключения к базе данных(' . mysqli_connect_error() . '): ' . mysqli_connect_error();
    exit();
}
$connect->set_charset("utf8");
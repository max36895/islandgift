<?php

$output = file_get_contents('php://input');

if ($output) {
    require_once 'YandexAlisa.php';

    $yandex = new YandexAlisa();
    $yandex->name = 'Index';
    echo $yandex->alisa($output);

} else {
    echo 'Ok';
}
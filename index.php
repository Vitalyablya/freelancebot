<?php
require_once "config.php";
require_once "curlFun.php";
$header = ["Authorization: Bearer " . AUTO_TOKEN, "Accept-Language: " . ACCEPT_LANG];
//print_r(sendCurl("https://api.freelancehunt.com/v2/my/profile", $header, "GET")); // - Проверка запросов

use Telegram\Bot\Api;

$telegram = new Api('BOT TOKEN');
?>
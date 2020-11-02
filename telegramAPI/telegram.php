<?php
require_once "vendor/autoload.php";
use Telegram\Bot\Api;
$telegram = new Api(BOT_TOKEN);

function sendMessage($text){
    global $telegram;
    $response = $telegram->sendMessage([
        'chat_id' => CHAT_ID, 
        'text' => $text
    ]);
}
?>
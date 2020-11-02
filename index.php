<?php
require_once "config.php";
require_once "freelanceHuntApi/freelanceHunt.php";
require_once "telegramAPI/telegram.php";

// sendMessage("тест");
//print_r(sendCurl("https://api.freelancehunt.com/v2/projects", "GET")); проверка

while(true){
    $lastProject = getLastProject();
    $lastProject_id = $lastProject['id'];
    $lastProject_safeId = file_get_contents("safeId.txt");
    if($lastProject_id != $lastProject_safeId){
        $lastProject_link = $lastProject['links']['self']['web'];
        $lastProject = $lastProject['attributes'];
        $lastProject_budget = $lastProject['budget']['amount'] . " " . $lastProject['budget']['currency'];
        $lastProject_description = $lastProject['description'];
        $lastProject_name = $lastProject['name'];

        $lastProject_skills = "";
        foreach($lastProject['skills'] as $key => $val){
            if($key !== 0) $lastProject_skills .= ", ";
            $lastProject_skills .= $val['name'];
        }

        $text = "$lastProject_name\n$lastProject_budget\n$lastProject_skills\n\n$lastProject_description\n$lastProject_link";
        sendMessage($text);

        file_put_contents("safeId.txt", $lastProject_id);
    }
    sleep(30);
}
?>
<?php 
function sendCurl($url, $headers, $req, $body = ""){
    $curl = curl_init();
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_HTTPHEADER, $headers);
    curl_setopt($curl, CURLOPT_USERAGENT, 'freelancehuntbot');
    curl_setopt($curl, CURLOPT_HEADER, false);

    if($req === "POST"){
        curl_setopt($curl, CURLOPT_CUSTOMREQUEST, 'POST');
        curl_setopt($curl, CURLOPT_POSTFIELDS, json_encode($body));
    }else if($req === "GET"){
        curl_setopt($curl, CURLOPT_URL, $url . "?" .$body);
    }
    curl_setopt($curl, CURLOPT_SSL_VERIFYPEER, 1);
    curl_setopt($curl, CURLOPT_SSL_VERIFYHOST, 2);
    $out = json_decode(curl_exec($curl), true); 
    $code = curl_getinfo($curl, CURLINFO_HTTP_CODE);
    curl_close($curl);
    return $out;
}?>
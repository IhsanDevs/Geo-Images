<?php
/*

*/
function Scan($path, $isArray = false)
    {
    $ch = curl_init('https://tool.geoimgr.com/upload');
    curl_setopt_array($ch, [
    CURLOPT_RETURNTRANSFER => true,
    CURLOPT_MAXREDIRS => 10,
    CURLOPT_TIMEOUT => 0,
    CURLOPT_FOLLOWLOCATION => true,
    CURLOPT_HTTP_VERSION => CURL_HTTP_VERSION_1_1,
    CURLOPT_CUSTOMREQUEST => 'POST',
    CURLOPT_POSTFIELDS => [
        'upfile'=>  new CURLFile(
            realpath($path)
        )
        ]
    ]);
    $response = curl_exec($ch);
    if (curl_errno($ch)) {
        return false;
    } else {
        return $isArray ? json_decode($response) : $response;
    }
    curl_close($ch);
}
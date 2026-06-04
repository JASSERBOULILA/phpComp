<?php

$apiKey = "AV4vZ19utJX0IirZFSLdccx6KYnsdObn";

function getGifs($searchTerm)
{
    global $apiKey;

    $url = "https://api.giphy.com/v1/gifs/search?"
        . "api_key=" . $apiKey
        . "&q=" . urlencode($searchTerm)
        . "&limit=12"
        . "&rating=g";

    $curl = curl_init();

    curl_setopt_array($curl, [
        CURLOPT_URL => $url,
        CURLOPT_RETURNTRANSFER => true,
        CURLOPT_FOLLOWLOCATION => true,
        CURLOPT_TIMEOUT => 30,
        CURLOPT_SSL_VERIFYPEER => true
    ]);

    $response = curl_exec($curl);

    if (curl_errno($curl)) {
        curl_close($curl);
        return [];
    }

    curl_close($curl);

    $data = json_decode($response, true);

    return $data['data'] ?? [];
}
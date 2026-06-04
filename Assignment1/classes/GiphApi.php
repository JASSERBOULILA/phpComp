<?php

class GiphyApi
{
    private string $apiKey;

    public function __construct(string $apiKey)
    {
        $this->apiKey = $apiKey;
    }

    public function getGifs(string $searchTerm): array
    {
        $url = "https://api.giphy.com/v1/gifs/search?"
            . "api_key=" . $this->apiKey
            . "&q=" . urlencode($searchTerm)
            . "&limit=3"
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
}
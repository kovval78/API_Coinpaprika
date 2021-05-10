<?php

namespace App\API;

use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\ResponseInterface;

class GetCoinsData
{
    protected $httpClient;
    protected $baseEndpoint = 'https://api.coinpaprika.com/v1/';  //obsługa błędów

    public function __construct()
    {
        $this->httpClient = HttpClient::create();
    }

    public function getCoins()
//    : ResponseInterface
    {
        return $this->httpClient->request('GET', $this->baseEndpoint . 'coins/')->toArray();
    }
}
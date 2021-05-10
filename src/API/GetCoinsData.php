<?php

namespace App\API;

use Symfony\Component\HttpClient\HttpClient;
use Symfony\Contracts\HttpClient\ResponseInterface;

class GetCoinsData
{
    protected $httpClient;
    protected $requestArray;
    protected $baseEndpoint = 'https://api.coinpaprika.com/v1/';

    public function __construct()
    {
        $this->httpClient = HttpClient::create();
    }

    public function getCoins(): array
    {
        $this->baseEndpoint = filter_var($this->baseEndpoint, FILTER_VALIDATE_URL);
        if ($this->baseEndpoint === false) {
            exit('Invalid URL' . PHP_EOL);
        }
        $this->requestArray = $this->httpClient->request('GET', $this->baseEndpoint . 'coins/');
        return $this->requestArray->toArray();
    }
}


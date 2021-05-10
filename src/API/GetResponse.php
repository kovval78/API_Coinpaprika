<?php

namespace App\API;

use Symfony\Component\HttpClient\HttpClient;

class GetResponse
{
    protected $httpClient;
    public $responseFirst;
    public $responseSecond;
    public $priceFirstCurrency;
    public $priceSecondCurrency;
    public $baseEndpoint = 'https://api.coinpaprika.com/v1/coins/';
    public $endpointPath = '/ohlcv/today/';

    public function __construct($askFirstCurrencyId, $askSecondCurrencyId)
    {
        $this->baseEndpoint = filter_var($this->baseEndpoint, FILTER_VALIDATE_URL);

        if ($this->baseEndpoint === false) {
            exit('Invalid URL');
        }

        $this->httpClient = HttpClient::create();

        $this->responseFirst = $this->httpClient->request('GET', $this->baseEndpoint . $askFirstCurrencyId . $this->endpointPath);
        $this->priceFirstCurrency = round($this->responseFirst->toArray()[0]['close'], 5);

        $this->responseSecond = $this->httpClient->request('GET', $this->baseEndpoint . $askSecondCurrencyId . $this->endpointPath);
        $this->priceSecondCurrency = round($this->responseSecond->toArray()[0]['close'], 5);
    }
}
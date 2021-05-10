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
    public $infoMessage;
    public $finalMessage;

    public function __construct()
    {
        $this->httpClient = HttpClient::create();
    }

    public function responseCoinsPrice($askFirstCurrencyId, $askSecondCurrencyId, $askFirstCurrency, $askSecondCurrency, $currencyAmount)
    {
        $this->responseFirst = $this->httpClient->request('GET', $this->baseEndpoint . $askFirstCurrencyId . $this->endpointPath);
        $this->priceFirstCurrency = round($this->responseFirst->toArray()[0]['close'], 5);

        $this->responseSecond = $this->httpClient->request('GET', $this->baseEndpoint . $askSecondCurrencyId . $this->endpointPath);
        $this->priceSecondCurrency = round($this->responseSecond->toArray()[0]['close'], 5);

        $buyCurrency = bcdiv($this->priceSecondCurrency, $this->priceFirstCurrency);

        $this->infoMessage = "The price of the first currency ($askFirstCurrency) is: $this->priceFirstCurrency USD and the second ($askSecondCurrency) is: $this->priceSecondCurrency USD";
        $this->finalMessage = "You can buy $buyCurrency " . $askFirstCurrency . " for " . $currencyAmount . " pieces of " . $askSecondCurrency . " currencies.";
    }
}



//$responseFirst = $httpClient->request('GET',
//    'https://api.coinpaprika.com/v1/coins/' . $askFirstCurrencyId . '/ohlcv/today/'
//);
//$priceFirstCurrency = round($responseFirst->toArray()[0]['close'], 5);
//
//$responseSecond = $httpClient->request('GET',
//    'https://api.coinpaprika.com/v1/coins/' . $askSecondCurrencyId . '/ohlcv/today/'
//);
//$priceSecondCurrency = round($responseSecond->toArray()[0]['close'], 5);
//
//$buyCurrency = bcdiv($priceSecondCurrency, $priceFirstCurrency);
//
//$infoMessage = "The price of the first currency ($askFirstCurrency) is: $priceFirstCurrency USD and the second ($askSecondCurrency) is: $priceSecondCurrency USD";
//$finalMessage = "You can buy $buyCurrency " . $askFirstCurrency . " for " . $currencyAmount . " pieces of " . $askSecondCurrency . " currencies.";
<?php

namespace App\Messages;

class FinalExchangeMessage
{
    protected $buyCurrency;
    public $infoMessage;
    public $finalMessage;

    public function __construct($priceFirstCurrency, $priceSecondCurrency, $askFirstCurrency, $askSecondCurrency, $currencyAmount)
    {
        $this->buyCurrency = bcdiv($priceSecondCurrency, $priceFirstCurrency);

        $this->infoMessage = "The price of the first currency " .  strtoupper(($askFirstCurrency)) . " is: $priceFirstCurrency USD and the second  " . strtoupper(($askSecondCurrency)) . " is: $priceSecondCurrency USD";
        $this->finalMessage = "You can buy $this->buyCurrency " . strtoupper(($askFirstCurrency)) . " for " . $currencyAmount . " pieces of " . strtoupper(($askSecondCurrency)) . " currencies.";
    }
}
<?php

namespace App\API;

class GetCoinsSymbol
{

    public $askFirstCurrencyId;
    public $askSecondCurrencyId;

    public function __construct($arrayCoinsData, $askFirstCurrency, $askSecondCurrency)
    {
        foreach ($arrayCoinsData as $value) {
            if ($value['symbol'] == $askFirstCurrency) {
                $this->askFirstCurrencyId = $value['id'];
            }
            if ($value['symbol'] == $askSecondCurrency) {
                $this->askSecondCurrencyId = $value['id'];
            }
        }

        if ($this->askFirstCurrencyId == null || $this->askSecondCurrencyId == null) {
            echo "The currency with the symbol $askFirstCurrency or $askSecondCurrency was not found.";
            die();
        }
    }
}

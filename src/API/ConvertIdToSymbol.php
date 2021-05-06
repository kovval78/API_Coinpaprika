<?php

namespace App\API;

use App\Command\AskCoinCommand;

class ConvertIdToSymbol extends AskCoinCommand
{
    private $askFirstCurrencyId = null;
    private $askSecondCurrencyId = null;

    protected function convertId() {

    }
}




//foreach($coins as $coin) {
//    if ($coin['symbol'] == $askFirstCurrency) {
//        $askFirstCurrencyId = $coin['id'];
//    }
//    if ($coin['symbol'] == $askSecondCurrency) {
//        $askSecondCurrencyId = $coin['id'];
//    }
//}
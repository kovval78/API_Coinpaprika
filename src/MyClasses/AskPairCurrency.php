<?php

namespace App\MyClasses;

use App\COmmand\AskCoinCommand;

class AskPairCurrency extends AskCoinCommand
{

    public function askCurrency($curr1, $curr2) {
        echo $curr1;
        echo $curr2;
    }
}

$firstCurr = new AskPairCurrency();
$firstCurr->askCurrency();




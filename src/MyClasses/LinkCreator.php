<?php

namespace App\MyClasses;

use App\Command\AskCoinCommand;

class LinkCreator extends AskCoinCommand
{

    public function askCurrency($curr1, $curr2, $amount) {
        echo $curr1;
        echo $curr2;
        echo $amount;
    }
}







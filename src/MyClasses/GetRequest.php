<?php

namespace App\MyClasses;

use App\Command\TestAskApiCommand;

class GetRequest extends TestAskApiCommand
{
    private string $baseAddress = "https://api.coinpaprika.com/v1/";

    public function Test() {

        $testRequest = "";

        return $testRequest;
    }
}
#!/usr/bin/env php
<?php

require __DIR__ . '/vendor/autoload.php';

use App\Command\MessageCommand;
//use App\HttpClient\SymfonyHttp;
use App\Command\AskCoinCommand;
use App\Command\TestAskApiCommand;
use Symfony\Component\Console\Application;


$app = new Application();

//$app->add(new AskCoinCommand());
$app->add(new TestAskApiCommand());

$app->run();



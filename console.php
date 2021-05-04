#!/usr/bin/env php
<?php

require __DIR__ . '/vendor/autoload.php';

use App\Command\MessageCommand;
use App\HttpClient\SymfonyHttp;
use App\Command\AskCoinCommand;
use Symfony\Component\Console\Application;


$app = new Application();

$app->add(new MessageCommand());
$app->add(new AskCoinCommand());

$app->run();



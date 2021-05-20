#!/usr/bin/env php
<?php

require __DIR__ . '/vendor/autoload.php';

use App\Command\AskCoinCommand;
use Symfony\Component\Console\Application;

$app = new Application();
$app->add(new AskCoinCommand());

$app->run();





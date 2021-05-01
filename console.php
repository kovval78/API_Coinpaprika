#!/usr/bin/env php
<?php

require __DIR__ . '/vendor/autoload.php';

use App\Command\MessageCommand;
use Symfony\Component\Console\Application;

$app = new Application();

$app->add(new MessageCommand());

$app->run();


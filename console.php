#!/usr/bin/env php
<?php
//session_start([
//    'cookie_lifetime' => 5,
//]);
//
//echo 'Welcome to page #1';
//
//$_SESSION['favcolor'] = 'green';
//$_SESSION['animal']   = 'cat';
//$_SESSION['time']     = time();
//
//echo date('Y m d H:i:s', $_SESSION['time']);

require __DIR__ . '/vendor/autoload.php';

use App\Command\AskCoinCommand;
use Symfony\Component\Console\Application;


$app = new Application();
$app->add(new AskCoinCommand());

$app->run();



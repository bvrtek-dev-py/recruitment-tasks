<?php

use App\Zad1\Service\UserService;
use App\Zad2\Fetcher\UrlFetcher;
use DI\Container;

require_once __DIR__ . '/../vendor/autoload.php';

/** @var Container $container */
$container = require_once 'di.php';

function zad1(Container $container): void
{
    $service = $container->get(UserService::class);
    
    $users = $service->getAll();
    
    foreach ($users as $user) {
        echo $user->name . "\n";
    }
}

zad1($container);

function zad2(Container $container): void
{
    $fetcher = $container->get(UrlFetcher::class);
    
    $data = $fetcher->fetch("https://example/api/data");
    
    foreach ($data as $key => $value) {
        echo $key . ": " . $value . "\n";
    }
}

zad2($container);
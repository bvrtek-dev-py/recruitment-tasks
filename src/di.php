<?php

require_once __DIR__ . "/Zad1/database-connector.php";

use DI\ContainerBuilder;

$containerBuilder = new ContainerBuilder();

$containerBuilder->useAutowiring(true);

$containerBuilder->addDefinitions([
    PDO::class => getPdo()
]);

$container = $containerBuilder->build();

return $container;
<?php

use App\Zad3\Logger\DatabaseLogger;
use App\Zad3\Logger\FileLogger;
use App\Zad3\Service\LoggerService;
use App\Zad3\Wrapper\FileWrapper;

$loggerService = new LoggerService();
$fileLogger = new FileLogger(new FileWrapper('/path/to/log.txt'));
$dbLogger = new DatabaseLogger(new PDO('mysql:dbname=testdb;host=127.0.0.1', 'user', 'pass'));

$loggerService->addLogger($fileLogger);
$loggerService->addLogger($dbLogger);

$loggerService->log('info', 'Testowa wiadomość');

<?php

namespace App\Zad3\Service;

use App\Zad3\Interfaces\LoggerInterface;

class LoggerService
{
    protected $loggers = [];
    
    public function addLogger(LoggerInterface $logger)
    {
        $this->loggers[] = $logger;
    }
    
    public function log(string $level, string $message)
    {
        foreach ($this->loggers as $logger) {
            $logger->log($level, $message);
        }
    }
    
    /** @return mixed[] */
    public function getLoggers(): array
    {
        return $this->loggers;
    }
}
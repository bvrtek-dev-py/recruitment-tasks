<?php

namespace App\Zad3\Logger;

use App\Zad3\Interfaces\LoggerInterface;
use App\Zad3\Wrapper\FileWrapper;

class FileLogger implements LoggerInterface
{
    protected $fileWrapper;
    
    public function __construct(FileWrapper $fileWrapper)
    {
        $this->fileWrapper = $fileWrapper;
    }
    
    public function log(string $level, string $message): void
    {
        $time = date('Y-m-d H:i:s');
        $logMessage = sprintf("[%s] [%s] %s\n", $time, $level, $message);
        $this->fileWrapper->write($logMessage);
    }
}
<?php

namespace App\Zad3\Wrapper;

class FileWrapper
{
    protected $filePath;
    
    public function __construct(string $filePath)
    {
        $this->filePath = $filePath;
    }
    
    public function write(string $message): void
    {
        file_put_contents($this->filePath, $message, FILE_APPEND);
    }
}
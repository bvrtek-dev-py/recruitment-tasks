<?php

namespace App\Zad3\Interfaces;

interface LoggerInterface
{
    public function log(string $level, string $message): void;
}
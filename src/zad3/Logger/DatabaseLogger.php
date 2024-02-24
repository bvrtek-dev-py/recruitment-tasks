<?php

namespace App\Zad3\Logger;

use App\Zad3\Interfaces\LoggerInterface;
use PDO;

class DatabaseLogger implements LoggerInterface
{
    protected $pdo;
    
    public function __construct(PDO $pdo)
    {
        $this->pdo = $pdo;
    }
    
    public function log(string $level, string $message): void
    {
        $stmt = $this->pdo->prepare("INSERT INTO logs (level, message, created_at) VALUES (?, ?, NOW())");
        $stmt->execute([$level, $message]);
    }
}
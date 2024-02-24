<?php

namespace Test\Unit;

use App\Zad3\Logger\DatabaseLogger;
use PHPUnit\Framework\TestCase;
use PDO;
use PDOStatement;

class DatabaseLoggerTest extends TestCase
{
    const TEST_CONTENT = 'Test content';
    
    /** @var DatabaseLogger */
    private $logger;
    
    /** @var PDOStatement */
    private $statement;
    
    /** @var PDO */
    private $pdo;
    
    protected function setUp(): void
    {
        $this->statement = $this->createMock(PDOStatement::class);
        $this->pdo = $this->createMock(PDO::class);
        
        $this->pdo->method('prepare')->willReturn($this->statement);
        
        $this->logger = new DatabaseLogger($this->pdo);
    }
    
    public function testLog(): void
    {
        $this->pdo->expects($this->once())
            ->method('prepare')
            ->willReturn($this->statement);
        
        $this->statement->expects($this->once())
            ->method('execute')
            ->willReturn(true);
        
        $this->logger->log('info', self::TEST_CONTENT);
    }
}

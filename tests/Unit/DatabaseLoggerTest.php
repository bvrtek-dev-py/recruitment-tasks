<?php

namespace Test\Unit;

use App\Zad3\Logger\DatabaseLogger;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use PDO;
use PDOStatement;

class DatabaseLoggerTest extends TestCase
{
    /** @var PDO|MockObject  */
    private $mockPdo;
    /** @var DatabaseLogger  */
    private $logger;
    /** @var MockObject|PDOStatement  */
    private $mockStatement;
    
    protected function setUp(): void
    {
        $this->mockPdo = $this->createMock(PDO::class);
        $this->logger = new DatabaseLogger($this->mockPdo);
        $this->mockStatement = $this->createMock(PDOStatement::class);
    }
    
    public function testLogMethodsInvokedOnce()
    {
        // Given
        $level = 'info';
        $message = 'Test message';
        
        // Expects
        $this->mockPdo->expects($this->once())
            ->method('prepare')
            ->with('INSERT INTO logs (level, message, created_at) VALUES (?, ?, NOW())')
            ->willReturn($this->mockStatement);
        
        
        $this->mockStatement->expects($this->once())
            ->method('execute')
            ->with([$level, $message])
            ->willReturn(true);

        // When
        $this->logger->log($level, $message);
    }
}
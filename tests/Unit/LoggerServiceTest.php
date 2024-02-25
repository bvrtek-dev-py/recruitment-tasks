<?php

namespace Test\Unit;

use App\Zad3\Interfaces\LoggerInterface;
use App\Zad3\Service\LoggerService;
use PHPUnit\Framework\TestCase;
use TypeError;

class LoggerServiceTest extends TestCase
{
    public function testAddLogger(): void
    {
        // Given
        $service = new LoggerService();
        $mockLogger = $this->createMock(LoggerInterface::class);
        
        // When
        $service->addLogger($mockLogger);
        
        // Then
        $this->assertCount(1, $service->getLoggers());
        $this->assertSame($mockLogger, $service->getLoggers()[0]);
    }
    
    public function testLog(): void
    {
        // Given
        $service = new LoggerService();
        
        $mockLogger = $this->createMock(LoggerInterface::class);
        $service->addLogger($mockLogger);
        
        $level = 'info';
        $message = 'test log message';
        
        $mockLogger->expects($this->once())
            ->method('log')
            ->with($this->equalTo($level), $this->equalTo($message));
        
        // When
        $service->log($level, $message);
    }
    
    public function testAddLoggerWithOtherType(): void
    {
        // Given
        $service = new LoggerService();
        
        $this->expectException(TypeError::class);
        
        // When
        $service->addLogger(null);
    }
    
    public function testLogWithNonStringLevel(): void
    {
        // Given
        $service = new LoggerService();
        $mockLogger = $this->createMock(LoggerInterface::class);
        $service->addLogger($mockLogger);
        
        $this->expectException(TypeError::class);
        
        // When
        $service->log(['info_as_array'], 'test log message');
    }
    
    public function testLogWithNonStringMessage(): void
    {
        // Given
        $service = new LoggerService();
        $mockLogger = $this->createMock(LoggerInterface::class);
        $service->addLogger($mockLogger);
        
        $this->expectException(TypeError::class);
        
        
        // When
        $service->log('info', ['message_as_array']);
    }
}

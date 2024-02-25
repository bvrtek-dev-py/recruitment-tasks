<?php

namespace Test\Unit;

use App\Zad3\Logger\FileLogger;
use App\Zad3\Wrapper\FileWrapper;
use DateTime;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class FileLoggerTest extends TestCase
{
    /** @var FileLogger */
    private $logger;
    
    /** @var FileWrapper|MockObject */
    private $fileWrapperMock;
    
    protected function setUp(): void
    {
        $this->fileWrapperMock = $this->createMock(FileWrapper::class);
        $this->logger = new FileLogger($this->fileWrapperMock);
    }
    
    public function testLog(): void
    {
        // Given
        $dateTime = new DateTime();
        $timestamp = $dateTime->format('Y-m-d H:i:s');
        $level = 'info';
        $message = 'Example content';
        $expectedLogMessage = sprintf("[%s] [%s] %s\n", $timestamp, $level, $message);

        $this->fileWrapperMock->expects($this->once())
            ->method('write')
            ->with($this->equalTo($expectedLogMessage));
        
        // When
        $this->logger->log($level, $message);
    }
    
    public function testLogBadLevel(): void
    {
        // Given
        $dateTime = new DateTime();
        $timestamp = $dateTime->format('Y-m-d H:i:s');
        $level = 'info';
        $message = 'Example content';
        $expectedLogMessage = sprintf("[%s] [%s] %s\n", $timestamp, $level, $message);
        
        $this->fileWrapperMock->expects($this->once())
            ->method('write')
            ->with($this->logicalNot($this->equalTo($expectedLogMessage)));
        
        // When
        $this->logger->log('debug', $message);
    }
    
    public function testLogBadMessage(): void
    {
        // Given
        $dateTime = new DateTime();
        $timestamp = $dateTime->format('Y-m-d H:i:s');
        $level = 'info';
        $message = 'Example content';
        $expectedLogMessage = sprintf("[%s] [%s] %s\n", $timestamp, $level, $message);
        
        $this->fileWrapperMock->expects($this->once())
            ->method('write')
            ->with($this->logicalNot($this->equalTo($expectedLogMessage)));
        
        // When
        $this->logger->log($level, 'bad content');
    }
}

<?php

namespace Test\Unit;

use App\Zad3\Logger\FileLogger;
use App\Zad3\Wrapper\FileWrapper;
use DateTime;
use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;

class FileLoggerTest extends TestCase
{
    const TEST_CONTENT = 'Example content';
    
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
        $dateTime = new DateTime();
        
        $timestamp = $dateTime->format('Y-m-d H:i:s');
        
        $expectedLogMessage = sprintf("[%s] [%s] %s\n", $timestamp, 'info', self::TEST_CONTENT);
        
        $this->fileWrapperMock->expects($this->once())
            ->method('write')
            ->with($this->equalTo($expectedLogMessage));
        
        $this->logger->log('info', self::TEST_CONTENT);
    }
}

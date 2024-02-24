<?php

namespace Test\Unit;

use App\Zad3\Interfaces\LoggerInterface;
use App\Zad3\Service\LoggerService;
use PHPUnit\Framework\TestCase;

class LoggerServiceTest extends TestCase
{
    const TEST_CONTENT = 'This is a test message 1';
    
    /** @var LoggerService */
    private $loggerService;
    /** @var LoggerInterface */
    private $loggerMock;
    
    protected function setUp(): void
    {
        $this->loggerService = new LoggerService();
        $this->loggerMock = $this->createMock(LoggerInterface::class);
    }
    
    public function testAddLogger(): void
    {
        $this->loggerService->addLogger($this->loggerMock);
        
        $this->assertCount(1, $this->loggerService->getLoggers());
    }
    
    public function testLog(): void
    {
        $this->loggerMock->expects($this->once())
            ->method('log')
            ->with($this->equalTo('info'), $this->equalTo(self::TEST_CONTENT));
        
        $this->loggerService->addLogger($this->loggerMock);
        
        $this->loggerService->log('info', self::TEST_CONTENT);
    }

}

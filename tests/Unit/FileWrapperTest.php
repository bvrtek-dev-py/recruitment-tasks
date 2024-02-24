<?php

namespace Test\Unit;

use App\Zad3\Wrapper\FileWrapper;
use PHPUnit\Framework\TestCase;

class FileWrapperTest extends TestCase
{
    const TEST_CONTENT = 'Example content for tested file';
    
    /** @var string */
    private $filePath;
    /** @var FileWrapper */
    private $fileWrapper;
    
    protected function setUp(): void
    {
        $this->filePath = __DIR__ . '/testFile.txt';
        $this->fileWrapper = new FileWrapper($this->filePath);
        
        file_put_contents($this->filePath, '');
    }
    
    protected function tearDown(): void
    {
        unlink($this->filePath);
    }
    
    public function testWrite(): void
    {
        $this->fileWrapper->write(self::TEST_CONTENT);
        
        $content = file_get_contents($this->filePath);
        
        $this->assertEquals(self::TEST_CONTENT, $content);
    }
}

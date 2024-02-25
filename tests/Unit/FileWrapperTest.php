<?php

namespace Test\Unit;

use App\Zad3\Wrapper\FileWrapper;
use PHPUnit\Framework\TestCase;
use TypeError;

class FileWrapperTest extends TestCase
{
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
        // Given
        $value = 'saved value';
        
        // When
        $this->fileWrapper->write($value);
        $content = file_get_contents($this->filePath);
        
        // Then
        $this->assertEquals($value, $content);
    }
    
    public function testWriteFail(): void
    {
        // Given
        $value = 'bad value';
        $checkedValue = 'checked value';
        
        // When
        $this->fileWrapper->write($value);
        $content = file_get_contents($this->filePath);
        
        // Then
        $this->assertNotEquals($checkedValue, $content);
    }
    
    public function testWriteNotString(): void
    {
        // Given
        $value = ['not string'];
        
        // When
        $this->expectException(TypeError::class);
        $this->fileWrapper->write($value);
        
        // Then
        $this->assertFileNotEquals($value);
    }
}

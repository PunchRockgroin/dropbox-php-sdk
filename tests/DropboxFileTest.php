<?php
namespace Kunnu\Dropbox;

use PHPUnit\Framework\TestCase;

class DropboxFileTest extends TestCase
{
    protected $stream;

    protected function setUp(): void
    {
        $this->stream = fopen(__FILE__, 'r');
    }

    protected function tearDown(): void
    {
        fclose($this->stream);
    }

    public function testGetStreamOrFilePathReturnsStringWhenConstructedNormally()
    {
        $dropboxFile = $this->getMockBuilder(DropboxFile::class)
            ->onlyMethods(['getFilePath', 'getStream', 'isCreatedFromStream'])
            ->disableOriginalConstructor()
            ->getMock();

        $dropboxFile
            ->expects($this->any())
            ->method('getFilePath')
            ->willReturn('/i/am/a/file');

        $dropboxFile
            ->expects($this->never())
            ->method('getStream');

        $dropboxFile
            ->expects($this->atLeastOnce())
            ->method('isCreatedFromStream')
            ->willReturn(false);

        $result = $dropboxFile->getStreamOrFilePath();

        self::assertSame('/i/am/a/file', $result);
    }

    public function testGetStreamOrFilePathReturnsStringWhenConstructedWithStream()
    {
        $dropboxFile = $this->getMockBuilder(DropboxFile::class)
            ->onlyMethods(['getFilePath', 'getStream', 'isCreatedFromStream'])
            ->disableOriginalConstructor()
            ->getMock();

        $dropboxFile
            ->expects($this->never())
            ->method('getFilePath');

        $dropboxFile
            ->expects($this->any())
            ->method('getStream')
            ->willReturn($this->stream);

        $dropboxFile
            ->expects($this->atLeastOnce())
            ->method('isCreatedFromStream')
            ->willReturn(true);

        $result = $dropboxFile->getStreamOrFilePath();

        self::assertSame($this->stream, $result);
    }
}

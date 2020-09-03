<?php

declare(strict_types=1);

namespace Psl\Tests\IO;

use PHPUnit\Framework\TestCase;
use Psl\IO;

final class ReaderTest extends TestCase
{
    public function test(): void
    {
        $resource = fopen(__FILE__, 'rb+');
        $handle = new IO\Internal\ResourceHandle($resource);
        $reader = new IO\Reader($handle);

        static::assertSame('<?php', $reader->readLine());
        static::assertSame('', $reader->readLine());
        static::assertSame('declare(strict_types=1);', $reader->readLine());
        static::assertSame('', $reader->readLine());
        static::assertSame('namespace Psl\Tests\IO;', $reader->readLine());
        static::assertSame('', $reader->readLine());
        static::assertSame('use PHPUnit\Framework\TestCase;', $reader->readLine());

        static::assertSame('use Psl', $reader->readUntil('\\'));
        static::assertSame('IO;', $reader->readLine());
        static::assertSame('', $reader->readLine());
        static::assertSame('final class', $reader->readFixedSize(11));

        do {
            $eof = $handle->read() === '';
        } while (!$eof);

        static::assertEmpty($handle->read());

        /**
         * Handle has reached EOL, but the buffer still contains content.
         */
        static::assertFalse($reader->isEndOfFile());
        static::assertSame(' ', $reader->readByte());
        static::assertSame('ReaderTest', $reader->readFixedSize(10));
    }
}

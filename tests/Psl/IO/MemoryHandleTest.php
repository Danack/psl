<?php

declare(strict_types=1);

namespace Psl\Tests\IO;

use PHPUnit\Framework\TestCase;
use Psl\IO;
use Psl\Str\Byte;

final class MemoryHandleTest extends TestCase
{
    public function test(): void
    {
        $handle = IO\memory_handle('f');
        $writer = new IO\Writer($handle);

        $writer->writeLine('Hello, World!');
        $writer->writeAllLines('', '- Read', '- Write', '- Seek', '- Close');

        $handle->seek(0);
        static::assertSame('Hello, World!', $handle->read(13));

        $handle->seek(13 + Byte\length(PHP_EOL) + Byte\length(PHP_EOL));
        static::assertSame('- Read', $handle->read(6));

        $handle->seek(19 + (Byte\length(PHP_EOL) * 3));
        static::assertSame('- Write', $handle->read(7));

        $handle->seek(26 + (Byte\length(PHP_EOL) * 4));
        static::assertSame('- Seek', $handle->read(6));

        $handle->seek(32 + (Byte\length(PHP_EOL) * 5));
        static::assertSame('- Close', $handle->read(7));

        static::assertSame(PHP_EOL, $handle->read());

        static::assertSame(45, $handle->tell());
    }
}

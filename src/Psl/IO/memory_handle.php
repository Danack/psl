<?php

declare(strict_types=1);

namespace Psl\IO;

use Psl\Str\Byte;

/**
 * Return a memory seek-read-write handle.
 */
function memory_handle(string $content = ''): SeekReadWriteHandle
{
    $handle = Internal\open('php://temp', 'rwb');
    $handle->write($content);
    $handle->flush();

    return $handle;
}

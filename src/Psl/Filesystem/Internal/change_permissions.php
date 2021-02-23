<?php

declare(strict_types=1);

namespace Psl\Filesystem\Internal;

use Psl\Filesystem;
use Psl\Filesystem\Exception;
use Psl\Internal;
use Psl\Str;

use function chmod;

/**
 * @param iterable<string>  $files
 *
 * @throws Exception\RuntimeException   If unable to change the ownership for
 *                                      the given file.
 *
 * @internal
 */
function change_permissions(iterable $files, int $permission, bool $recursive = false): void
{
    foreach ($files as $file) {
        if ($recursive && Filesystem\is_directory($file) && !Filesystem\is_symbolic_link($file)) {
            change_permissions(Filesystem\read_directory($file), $permission, true);
        }

        [$success, $error] = Internal\box(static fn(): bool => chmod($file, $permission));
        // @codeCoverageIgnoreStart
        if (!$success) {
            throw new Exception\RuntimeException(Str\format(
                'Failed to change permissions for file "%s": %s',
                $file,
                $error ?? 'internal error.',
            ));
        }
        // @codeCoverageIgnoreEnd
    }
}

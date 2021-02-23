<?php

declare(strict_types=1);

namespace Psl\Filesystem\Internal;

use Psl\Filesystem;
use Psl\Filesystem\Exception;
use Psl\Internal;
use Psl\Str;

use function chown;
use function lchown;

/**
 * @param iterable<string>  $files
 * @param string|int        $user
 *
 * @throws Exception\RuntimeException   If unable to change the ownership for
 *                                      the given file.
 *
 * @internal
 */
function change_owner(iterable $files, $user, bool $recursive = false): void
{
    foreach ($files as $file) {
        if ($recursive && Filesystem\is_directory($file) && !Filesystem\is_symbolic_link($file)) {
            change_owner(Filesystem\read_directory($file), $user, true);
        }

        if (Filesystem\is_symbolic_link($file)) {
            $fun = static fn(): bool => lchown($file, $user);
        } else {
            $fun = static fn(): bool => chown($file, $user);
        }

        [$success, $error] = Internal\box($fun);
        if (!$success) {
            throw new Exception\RuntimeException(Str\format(
                'Failed to change owner for file "%s": %s',
                $file,
                $error ?? 'internal error.',
            ));
        }
    }
}

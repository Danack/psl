<?php

declare(strict_types=1);

namespace Psl\Filesystem\Internal;

use Psl\Filesystem;
use Psl\Filesystem\Exception;
use Psl\Internal;
use Psl\Str;

use function chgrp;
use function lchgrp;

/**
 * @param iterable<string>  $files
 * @param string|int        $group
 *
 * @throws Exception\RuntimeException   If unable to change the ownership for
 *                                      the given file.
 *
 * @internal
 */
function change_group(iterable $files, $group, bool $recursive = false): void
{
    foreach ($files as $file) {
        if ($recursive && Filesystem\is_directory($file) && !Filesystem\is_symbolic_link($file)) {
            change_group(Filesystem\read_directory($file), $group, true);
        }

        if (Filesystem\is_symbolic_link($file)) {
            $fun = static fn(): bool => lchgrp($file, $group);
        } else {
            $fun = static fn(): bool => chgrp($file, $group);
        }

        [$success, $error] = Internal\box($fun);
        if (!$success) {
            throw new Exception\RuntimeException(Str\format(
                'Failed to change the group for file "%s": %s',
                $file,
                $error ?? 'internal error.',
            ));
        }
    }
}

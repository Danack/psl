<?php

declare(strict_types=1);

namespace Psl\Filesystem;

use Psl;

/**
 * Changes mode permission of $filename.
 *
 * @param bool $recursive Whether change the mode recursively or not.
 *
 * @throws Exception\RuntimeException If unable to change the mode for the given $filename.
 * @throws Psl\Exception\InvariantViolationException If $filename does not exists.
 */
function change_permissions(string $filename, int $permissions, bool $recursive = false): void
{
    Psl\invariant(exists($filename), '$filename does not exist.');

    Internal\change_permissions([$filename], $permissions, $recursive);
}

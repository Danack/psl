<?php

declare(strict_types=1);

namespace Psl\Filesystem;

use Psl;

/**
 * Change the group ownership of $filename.
 *
 * @param bool  $recursive  Whether change the group ownership recursively or not.
 *
 * @throws Exception\RuntimeException If unable to change the group ownership for $filename.
 * @throws Psl\Exception\InvariantViolationException If $filename does not exist.
 */
function change_group(string $filename, int $group, bool $recursive = false): void
{
    Psl\invariant(exists($filename), '$filename does not exist.');

    Internal\change_owner([$filename], $group, $recursive);
}

<?php

declare(strict_types=1);

namespace Psl\Filesystem;

use Psl;

/**
 * Change the owner of $filename.
 *
 * @param bool $recursive Whether change the owner recursively or not.
 *
 * @throws Exception\RuntimeException   If unable to change the ownership for $filename.
 * @throws Psl\Exception\InvariantViolationException If $filename does not exist.
 */
function change_owner(string $filename, int $user, bool $recursive = false): void
{
    Psl\invariant(exists($filename), '$filename does not exist.');

    Internal\change_owner([$filename], $user, $recursive);
}

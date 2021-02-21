<?php

declare(strict_types=1);

namespace Psl\ObjectOriented;

use function interface_exists as php_interface_exists;

/**
 * Checks if the interface has been defined.
 *
 * Example:
 *
 *      ObjectOriented\interface_exists('Psl\Collection\VectorInterface');
 *      => Bool(true)
 *
 *      ObjectOriented\interface_exists('Psl\Collection\FooInterface');
 *      => Bool(false)
 *
 */
function interface_exists(string $interface_name): bool
{
    return php_interface_exists($interface_name);
}

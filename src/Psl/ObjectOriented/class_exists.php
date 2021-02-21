<?php

declare(strict_types=1);

namespace Psl\ObjectOriented;

use function class_exists as php_class_exists;

/**
 * Checks if the class has been defined.
 *
 * Example:
 *
 *      ObjectOriented\class_exists('Psl\Collection\Vector');
 *      => Bool(true)
 *
 *      ObjectOriented\class_exists('Psl\Collection\Foo');
 *      => Bool(false)
 *
 * @psalm-assert-if-true class-string $class_name
 */
function class_exists(string $class_name): bool
{
    return php_class_exists($class_name);
}

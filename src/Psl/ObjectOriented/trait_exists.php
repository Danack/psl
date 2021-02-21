<?php

declare(strict_types=1);

namespace Psl\ObjectOriented;

use function trait_exists as php_trait_exists;

/**
 * Checks if the trait has been defined.
 *
 * Example:
 *
 *      ObjectOriented\class_exists('Psl\Collection\Vector');
 *      => Bool(true)
 *
 *      ObjectOriented\class_exists('Psl\Collection\Foo');
 *      => Bool(false)
 *
 *
 * @psalm-assert-if-true class-string $class_name
 */
function trait_exists(string $trait_name): bool
{
    // PHPs trait_exists returns null in case of an error.
    return php_trait_exists($trait_name) ?? false;
}

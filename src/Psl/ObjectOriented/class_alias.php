<?php

declare(strict_types=1);

namespace Psl\ObjectOriented;

use function class_alias as php_class_alias;
use function error_reporting;

/**
 * Creates an alias for a class.
 *
 * Example:
 *
 *      $class_name = Collection\Vector::class;
 *      $alias = 'AwesomeVector';
 *
 *      ObjectOriented\class_alias($class_name, $alias);
 *      => Bool(true)
 *
 *      $vector = new $alias(['a', 'b']);
 *
 *      Type\object($class_name)->matches($vector);
 *      => Bool(true)
 *
 * @template T
 *
 * @param class-string<T> $class_name
 *
 * @psalm-assert-if-true class-string<T> $alias
 *
 * @return bool Returns false if unable to create an alias.
 */
function class_alias(string $class_name, string $alias): bool
{
    $previous = error_reporting(0);

    try {
        return php_class_alias($class_name, $alias);
    } finally {
        error_reporting($previous);
    }
}

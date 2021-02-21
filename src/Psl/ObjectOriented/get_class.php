<?php

declare(strict_types=1);

namespace Psl\ObjectOriented;

use function get_class as php_get_class;

/**
 * Returns the name of the class of an object.
 *
 * Example:
 *
 *      ObjectOriented\get_class($vector);
 *      => Str('Psl\Collection\Vector')
 *
 * @template T of object
 *
 * @param T $object
 *
 * @return class-string<T>
 *
 * @psalm-pure
 */
function get_class(object $object): string
{
    return php_get_class($object);
}

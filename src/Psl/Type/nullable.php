<?php

declare(strict_types=1);

namespace Psl\Type;

use Psl;

/**
 * @template T
 *
 * @psalm-param TypeInterface<T> $inner_type
 *
 * @psalm-return TypeInterface<T|null>
 *
 * @throws Psl\Exception\InvariantViolationException If $inner_type is optional.
 */
function nullable(TypeInterface $inner_type): TypeInterface
{
    return new Internal\NullableType($inner_type);
}

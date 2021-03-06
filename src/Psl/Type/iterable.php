<?php

declare(strict_types=1);

namespace Psl\Type;

/**
 * @template Tk
 * @template Tv
 *
 * @psalm-param TypeInterface<Tk> $key_type
 * @psalm-param TypeInterface<Tv> $value_type
 *
 * @psalm-return TypeInterface<iterable<Tk, Tv>>
 */
function iterable(TypeInterface $key_type, TypeInterface $value_type): TypeInterface
{
    return new Internal\IterableType($key_type, $value_type);
}

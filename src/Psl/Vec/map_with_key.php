<?php

declare(strict_types=1);

namespace Psl\Vec;

/**
 * Applies a mapping function to all values of an iterable.
 *
 * The function is passed the current iterable key and value and should return a
 * modified value.
 *
 * Examples:
 *
 *     Vec\map_with_key([1, 2, 3, 4, 5], fn($k, $v) => $k + $v);
 *     => Vec(1, 3, 5, 7, 9)
 *
 * @psalm-template Tk
 * @psalm-template Tv
 * @psalm-template T
 *
 * @psalm-param iterable<Tk, Tv>       $iterable Iterable to be mapped over
 * @psalm-param (callable(Tk,Tv): T)   $function
 *
 * @psalm-return list<T>
 */
function map_with_key(iterable $iterable, callable $function): array
{
    $result = [];
    foreach ($iterable as $key => $value) {
        $result[] = $function($key, $value);
    }

    return $result;
}

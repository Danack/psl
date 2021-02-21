<?php

declare(strict_types=1);

namespace Psl\Tests\ObjectOriented;

use PHPUnit\Framework\TestCase;
use Psl\Collection;
use Psl\Iter;
use Psl\ObjectOriented;

final class GetClassTest extends TestCase
{
    /**
     * @dataProvider provideData
     */
    public function testGetClass(string $expected, object $object): void
    {
        static::assertSame($expected, ObjectOriented\get_class($object));
    }

    public function provideData(): iterable
    {
        yield [
            Collection\MutableVector::class,
            new Collection\MutableVector([])
        ];

        yield [
            Iter\Iterator::class,
            Iter\Iterator::create([]),
        ];
    }
}

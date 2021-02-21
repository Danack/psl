<?php

declare(strict_types=1);

namespace Psl\Tests\ObjectOriented;

use PHPUnit\Framework\TestCase;
use Psl\Collection;
use Psl\ObjectOriented;

final class TraitExistsTest extends TestCase
{
    /**
     * @dataProvider provideData
     */
    public function testTraitExists(bool $expected, string $trait_name): void
    {
        static::assertSame($expected, ObjectOriented\trait_exists($trait_name));
    }

    public function provideData(): iterable
    {
        yield [true, Fixture\EmptyTrait::class];
        yield [false, Collection\MutableVectorInterface::class];
        yield [false, Collection\MutableVector::class];
        yield [false, 'Foo\Interface'];
    }
}

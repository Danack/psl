<?php

declare(strict_types=1);

namespace Psl\Tests\ObjectOriented;

use PHPUnit\Framework\TestCase;
use Psl\Collection;
use Psl\Iter;
use Psl\ObjectOriented;
use Psl\Type;

final class ClassAliasTest extends TestCase
{
    /**
     * @dataProvider provideData
     */
    public function testClassAlias(bool $expected, object $object, string $alias): void
    {
        $class_name = ObjectOriented\get_class($object);

        static::assertSame($expected, ObjectOriented\class_alias($class_name, $alias));

        if ($expected) {
            // Assert alias class exists.
            static::assertTrue(ObjectOriented\class_exists($alias));

            // Assert an instanceof $class_name is also an instanceof $alias
            static::assertTrue(Type\object($alias)->matches($object));
        }
    }

    public function provideData(): iterable
    {
        yield [
            true,
            new Collection\MutableVector([]),
            'Psl\Tests\ObjectOriented\Collection\MutableVectorAlias'
        ];

        yield [
            true,
            Iter\Iterator::create([]),
            'Psl\Tests\ObjectOriented\Iter\Iterator'
        ];

        yield [
            false,
            Iter\Iterator::create([]),
            Collection\MutableVector::class
        ];

        yield [
            false,
            Iter\Iterator::create([]),
            Collection\MutableVectorInterface::class
        ];

        ObjectOriented\trait_exists(Fixture\EmptyTrait::class);

        yield [
            false,
            Iter\Iterator::create([]),
            Fixture\EmptyTrait::class
        ];

        yield [
            true,
            Iter\Iterator::create([]),
            'Psl\Str\contains'
        ];
    }
}

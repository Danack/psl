<?php

declare(strict_types=1);

namespace Psl\Tests\ObjectOriented;

use PHPUnit\Framework\TestCase;
use Psl\Collection;
use Psl\ObjectOriented;

final class InterfaceExistsTest extends TestCase
{
    /**
     * @dataProvider provideData
     */
    public function testInterfaceExists(bool $expected, string $interface_name): void
    {
        static::assertSame($expected, ObjectOriented\interface_exists($interface_name));
    }

    public function provideData(): iterable
    {
        yield [true, Collection\MutableVectorInterface::class];
        yield [false, Collection\MutableVector::class];
        yield [false, 'Foo\Interface'];
    }
}

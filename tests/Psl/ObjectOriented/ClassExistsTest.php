<?php

declare(strict_types=1);

namespace Psl\Tests\ObjectOriented;

use PHPUnit\Framework\TestCase;
use Psl\Collection;
use Psl\ObjectOriented;

final class ClassExistsTest extends TestCase
{
    /**
     * @dataProvider provideData
     */
    public function testClassExists(bool $expected, string $class_name): void
    {
        static::assertSame($expected, ObjectOriented\class_exists($class_name));
    }

    public function provideData(): iterable
    {
        yield [true, Collection\MutableVector::class];
        yield [false, 'Collection\MutableVector'];
    }
}

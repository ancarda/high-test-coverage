<?php

declare(strict_types=1);

namespace Tests\RandomInt;

use Ancarda\HighTestCoverage\RandomInt\Succession;
use LogicException;
use PHPUnit\Framework\TestCase;

final class SuccessionTest extends TestCase
{
    public function testSuccession(): void
    {
        $succession = new Succession([2, 4, 5, 9]);

        self::assertSame(2, $succession(1, 10));
        self::assertSame(4, $succession(1, 10));
        self::assertSame(5, $succession(1, 10));
        self::assertSame(9, $succession(1, 10));
    }

    public function testSuccessionWrapsAround(): void
    {
        $succession = new Succession([1, 2, 3]);

        for ($i = 0; $i <= 3; $i++) {
            self::assertSame(1, $succession(1, 10));
            self::assertSame(2, $succession(1, 10));
            self::assertSame(3, $succession(1, 10));
        }
    }

    public function testRewind(): void
    {
        $succession = new Succession([2, 4, 5, 9]);

        self::assertSame(2, $succession(1, 10));
        self::assertSame(4, $succession(1, 10));
        $succession->rewind();
        self::assertSame(2, $succession(1, 10));
        self::assertSame(4, $succession(1, 10));
        self::assertSame(5, $succession(1, 10));
        self::assertSame(9, $succession(1, 10));
    }

    public function testSuccessionRejectsEmptyArrays(): void
    {
        $this->expectException(LogicException::class);

        new Succession([]);
    }
}

<?php

declare(strict_types=1);

namespace Tests\RandomBytes;

use Ancarda\HighTestCoverage\RandomBytes\Succession;
use LogicException;
use PHPUnit\Framework\TestCase;

final class SuccessionTest extends TestCase
{
    public function testSuccession(): void
    {
        $succession = new Succession(['red', 'yellow', 'green', 'blue']);

        self::assertSame('red', $succession(1));
        self::assertSame('yellow', $succession(1));
        self::assertSame('green', $succession(1));
        self::assertSame('blue', $succession(1));
    }

    public function testSuccessionWrapsAround(): void
    {
        $succession = new Succession(['red', 'yellow', 'green']);

        for ($i = 0; $i <= 3; $i++) {
            self::assertSame('red', $succession(1));
            self::assertSame('yellow', $succession(1));
            self::assertSame('green', $succession(1));
        }
    }

    public function testRewind(): void
    {
        $succession = new Succession(['red', 'yellow', 'green', 'blue']);

        self::assertSame('red', $succession(1));
        self::assertSame('yellow', $succession(1));
        $succession->rewind();
        self::assertSame('red', $succession(1));
        self::assertSame('yellow', $succession(1));
        self::assertSame('green', $succession(1));
        self::assertSame('blue', $succession(1));
    }

    public function testSuccessionRejectsEmptyArrays(): void
    {
        $this->expectException(LogicException::class);
        $this->expectExceptionMessage('succession cannot be empty');

        new Succession([]);
    }
}

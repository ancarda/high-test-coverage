<?php

declare(strict_types=1);

namespace Tests\DateTimeImmutable;

use Ancarda\HighTestCoverage\DateTimeImmutable\Succession;
use DateTimeImmutable;
use DateTimeZone;
use LogicException;
use PHPUnit\Framework\TestCase;

final class SuccessionTest extends TestCase
{
    public function testSuccession(): void
    {
        $a = new DateTimeImmutable('2000-01-01T00:00:00Z');
        $b = new DateTimeImmutable('2001-01-01T00:00:00Z');
        $c = new DateTimeImmutable('2002-01-01T00:00:00Z');
        $d = new DateTimeImmutable('2003-01-01T00:00:00Z');

        $succession = new Succession([$a, $b, $c, $d]);

        self::assertSame($a, $succession());
        self::assertSame($b, $succession());
        self::assertSame($c, $succession());
        self::assertSame($d, $succession());
    }

    public function testSuccessionWrapsAround(): void
    {
        $a = new DateTimeImmutable('2000-01-01T00:00:00Z');
        $b = new DateTimeImmutable('2001-01-01T00:00:00Z');
        $c = new DateTimeImmutable('2002-01-01T00:00:00Z');

        $succession = new Succession([$a, $b, $c]);

        for ($i = 0; $i <= 3; $i++) {
            self::assertSame($a, $succession());
            self::assertSame($b, $succession());
            self::assertSame($c, $succession());
        }
    }

    public function testRewind(): void
    {
        $a = new DateTimeImmutable('2000-01-01T00:00:00Z');
        $b = new DateTimeImmutable('2001-01-01T00:00:00Z');
        $c = new DateTimeImmutable('2002-01-01T00:00:00Z');
        $d = new DateTimeImmutable('2003-01-01T00:00:00Z');

        $succession = new Succession([$a, $b, $c, $d]);

        self::assertSame($a, $succession());
        self::assertSame($b, $succession());
        $succession->rewind();
        self::assertSame($a, $succession());
        self::assertSame($b, $succession());
        self::assertSame($c, $succession());
        self::assertSame($d, $succession());
    }

    public function testSuccessionRejectsEmptyArrays(): void
    {
        $this->expectException(LogicException::class);
        $this->expectExceptionMessage('succession cannot be empty');

        new Succession([]);
    }
}

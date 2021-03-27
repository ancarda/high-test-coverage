<?php

declare(strict_types=1);

namespace Tests\RandomInt;

use Ancarda\HighTestCoverage\RandomInt\Real;
use PHPUnit\Framework\TestCase;

final class RealTest extends TestCase
{
    public function testSimpleRanges(): void
    {
        $real = new Real();

        self::assertSame(1, $real(1, 1));
        self::assertSame(2, $real(2, 2));

        $a = $real(1, 2);
        $b = $real(3, 4);

        self::assertNotSame($a, $b);
        self::assertLessThanOrEqual(2, $a);
        self::assertLessThanOrEqual(4, $b);
    }

    public function testLooksRandom(): void
    {
        $real = new Real();

        while (true) {
            $c = $real(0, 0xFFFF);
            $d = $real(0, 0xFFFF);

            if ($c !== $d) {
                self::assertNotSame($c, $d);
                return;
            }
        }
    }
}

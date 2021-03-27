<?php

declare(strict_types=1);

namespace Tests\RandomInt;

use Ancarda\HighTestCoverage\RandomInt\OneShot;
use PHPUnit\Framework\TestCase;

final class OneShotTest extends TestCase
{
    public function testOneShotAlwaysReturnsSameNumber(): void
    {
        $oneShot = new OneShot();

        $numA = $oneShot(1, 10);
        self::assertSame($numA, $oneShot(1, 10));
    }

    public function testLooksRandom(): void
    {
        while (true) {
            $a = (new OneShot())(0, 0xFFFF);
            $b = (new OneShot())(0, 0xFFFF);

            if ($a !== $b) {
                self::assertNotSame($a, $b);
                return;
            }
        }
    }
}

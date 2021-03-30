<?php

declare(strict_types=1);

namespace Tests\RandomBytes;

use Ancarda\HighTestCoverage\RandomBytes\OneShot;
use PHPUnit\Framework\TestCase;

final class OneShotTest extends TestCase
{
    public function testOneShotAlwaysReturnsSameString(): void
    {
        $oneShot = new OneShot();

        $output = $oneShot(10);
        self::assertSame($output, $oneShot(10));
    }

    public function testLooksRandom(): void
    {
        while (true) {
            $a = (new OneShot())(32);
            $b = (new OneShot())(32);

            if ($a !== $b) {
                self::assertNotSame($a, $b);
                return;
            }
        }
    }
}

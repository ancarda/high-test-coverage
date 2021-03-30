<?php

declare(strict_types=1);

namespace Tests\RandomBytes;

use Ancarda\HighTestCoverage\RandomBytes\Real;
use PHPUnit\Framework\TestCase;

final class RealTest extends TestCase
{
    public function testLooksRandom(): void
    {
        $real = new Real();

        while (true) {
            $c = $real(0xFF);
            $d = $real(0xFF);

            if ($c !== $d) {
                self::assertNotSame($c, $d);
                return;
            }
        }
    }
}

<?php

declare(strict_types=1);

namespace Tests\RandomInt;

use Ancarda\HighTestCoverage\RandomInt\Fixed;
use PHPUnit\Framework\TestCase;

final class FixedTest extends TestCase
{
    public function testFixed(): void
    {
        $fixed = new Fixed(6);

        $a = $fixed(1, 6);
        $b = $fixed(1, 6);

        self::assertSame($a, $b);
    }

    public function testReturnFixedValueOutsideRange(): void
    {
        $fixed = new Fixed(123);

        self::assertSame(123, $fixed(1, 6));
    }
}

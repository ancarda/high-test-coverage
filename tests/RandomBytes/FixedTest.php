<?php

declare(strict_types=1);

namespace Tests\RandomBytes;

use Ancarda\HighTestCoverage\RandomBytes\Fixed;
use PHPUnit\Framework\TestCase;

final class FixedTest extends TestCase
{
    public function testFixed(): void
    {
        $fixed = new Fixed('abc');

        $a = $fixed(3);
        $b = $fixed(3);

        self::assertSame($a, $b);
    }

    public function testReturnFixedValueOutsideRange(): void
    {
        $fixed = new Fixed('abcdef');

        self::assertSame('abcdef', $fixed(6));
    }
}

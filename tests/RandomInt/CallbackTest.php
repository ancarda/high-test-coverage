<?php

declare(strict_types=1);

namespace Tests\RandomInt;

use Ancarda\HighTestCoverage\RandomInt\Callback;
use PHPUnit\Framework\TestCase;

final class CallbackTest extends TestCase
{
    public function testCallback(): void
    {
        $min = new Callback('min');
        $max = new Callback('max');

        $a = $min(1, 6);
        $b = $max(1, 6);

        self::assertSame(1, $a);
        self::assertSame(6, $b);
    }
}

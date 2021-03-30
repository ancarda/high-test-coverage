<?php

declare(strict_types=1);

namespace Tests\DateTimeImmutable;

use Ancarda\HighTestCoverage\DateTimeImmutable\Fixed;
use DateTimeZone;
use DateTimeImmutable;
use PHPUnit\Framework\TestCase;

final class FixedTest extends TestCase
{
    public function testFixed(): void
    {
        $dt = new DateTimeImmutable();
        $fixed = new Fixed($dt);

        $a = $fixed();
        $b = $fixed();

        self::assertSame($a, $b);
    }
}

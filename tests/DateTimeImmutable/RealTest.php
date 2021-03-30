<?php

declare(strict_types=1);

namespace Tests\DateTimeImmutable;

use Ancarda\HighTestCoverage\DateTimeImmutable\Real;
use DateTimeZone;
use PHPUnit\Framework\TestCase;

final class RealTest extends TestCase
{
    public function testReal(): void
    {
        $dt = (new Real())('2000-01-01T00:00:00Z', new DateTimeZone('UTC'));
        self::assertSame('2000-01-01T00:00:00+00:00', $dt->format('c'));
    }
}

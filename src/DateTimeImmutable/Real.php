<?php

declare(strict_types=1);

namespace Ancarda\HighTestCoverage\DateTimeImmutable;

use DateTimeImmutable;
use DateTimeZone;

/**
 * Produce a real DateTimeImmutable instance
 *
 * This class just wraps DateTimeImmutable::__construct and is intended to be
 * used in production.
 */
final class Real implements DateTimeImmutableFactory
{
    public function __invoke(
        string $datetime = "now",
        ?DateTimeZone $timezone = null
    ): DateTimeImmutable {
        return new DateTimeImmutable($datetime, $timezone);
    }
}

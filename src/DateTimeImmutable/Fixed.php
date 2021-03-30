<?php

declare(strict_types=1);

namespace Ancarda\HighTestCoverage\DateTimeImmutable;

use DateTimeImmutable;
use DateTimeZone;

/**
 * Return a predetermined fixed value every time
 *
 * This is the simplest possible implementation of DateTimeImmutable.
 * The value given in the constructor is returned from invoke every time.
 */
final class Fixed implements DateTimeImmutableFactory
{
    /** @var DateTimeImmutable */
    private $value;

    public function __construct(DateTimeImmutable $value)
    {
        $this->value = $value;
    }

    public function __invoke(
        string $datetime = "now",
        ?DateTimeZone $timezone = null
    ): DateTimeImmutable {
        return $this->value;
    }
}

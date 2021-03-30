<?php

declare(strict_types=1);

namespace Ancarda\HighTestCoverage\DateTimeImmutable;

use DateTimeImmutable;
use DateTimeZone;

/**
 * Factory that produces a DateTimeImmutable instance
 *
 * You should typehint with this interface in all your code. A typical use
 * would be to have a constructor accept an instance like so:
 *
 *     function __construct(DateTimeImmutableFactory $dateTimeImmutable)
 *
 * Which is then used throughout a class. Your Dependency Injection container
 * would then have an entry that resolves to Real:
 *
 *     :DateTimeImmutableFactory:class => Real::class,
 *
 * When that class is under test, you'll instead give it a class like Fixed.
 */
interface DateTimeImmutableFactory
{
    public function __invoke(
        string $datetime = "now",
        ?DateTimeZone $timezone = null
    ): DateTimeImmutable;
}

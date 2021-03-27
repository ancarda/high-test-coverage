<?php

declare(strict_types=1);

namespace Ancarda\HighTestCoverage\RandomInt;

/**
 * Mockable wrapper around random_int
 *
 * You should typehint with this interface in all your code. A typical use
 * would be to have a constructor accept a RandomInt like so:
 *
 *     function __construct(RandomInt $randomInt)
 *
 * Which is then used throughout a class. Your Dependency Injection container
 * would then have an entry for RandomInt that resolves to Real:
 *
 *     RandomInt::class => Real::class,
 *
 * When that class is under test, you'll instead give it a class like Fixed.
 */
interface RandomInt
{
    public function __invoke(int $min, int $max): int;
}

<?php

declare(strict_types=1);

namespace Ancarda\HighTestCoverage\RandomBytes;

/**
 * Mockable wrapper around random_bytes
 *
 * You should typehint with this interface in all your code. A typical use
 * would be to have a constructor accept an instance like so:
 *
 *     function __construct(RandomBytes $randomBytes)
 *
 * Which is then used throughout a class. Your Dependency Injection container
 * would then have an entry that resolves to Real:
 *
 *     RandomBytes::class => Real::class,
 *
 * When that class is under test, you'll instead give it a class like Fixed.
 */
interface RandomBytes
{
    public function __invoke(int $length): string;
}

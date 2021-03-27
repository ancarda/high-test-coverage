<?php

declare(strict_types=1);

namespace Ancarda\HighTestCoverage\RandomInt;

/**
 * Generate real random numbers
 *
 * This class just wraps random_int and is intended to be used in production
 * when you need a real random number generator that you can mock.
 */
final class Real implements RandomInt
{
    public function __invoke(int $min, int $max): int
    {
        return random_int($min, $max);
    }
}

<?php

declare(strict_types=1);

namespace Ancarda\HighTestCoverage\RandomInt;

use RuntimeException;

/**
 * Fail to generate a random number every time
 *
 * This class always throws an exception when you request a random number. It's
 * intended to be used to test how your code behaves when randomness is not
 * currently available.
 */
final class Failure implements RandomInt
{
    public function __invoke(int $min, int $max): int
    {
        throw new RuntimeException('Could not gather sufficient random data');
    }
}

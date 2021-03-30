<?php

declare(strict_types=1);

namespace Ancarda\HighTestCoverage\RandomBytes;

use RuntimeException;

/**
 * Fail to generate random bytes every time
 *
 * This class always throws an exception when you request random bytes. It's
 * intended to be used to test how your code behaves when randomness is not
 * available.
 */
final class Failure implements RandomBytes
{
    public function __invoke(int $length): string
    {
        throw new RuntimeException('Could not gather sufficient random data');
    }
}

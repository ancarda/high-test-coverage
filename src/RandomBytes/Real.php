<?php

declare(strict_types=1);

namespace Ancarda\HighTestCoverage\RandomBytes;

/**
 * Generate real random bytes
 *
 * This class just wraps random_bytes and is intended to be used in production
 * when you need a real random byte generator that you can mock.
 */
final class Real implements RandomBytes
{
    public function __invoke(int $length): string
    {
        return random_bytes($length);
    }
}

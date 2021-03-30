<?php

declare(strict_types=1);

namespace Ancarda\HighTestCoverage\RandomBytes;

/**
 * Generate a single random string that is returned forever
 *
 * OneShot generates a single real random string, then returns that -- and
 * always that -- forever.
 *
 * This is intended to be used when you need uniformity across a test run, but
 * can have or want randomness between test runs.
 */
final class OneShot implements RandomBytes
{
    /** @var string|null */
    private $value = null;

    public function __invoke(int $length): string
    {
        if ($this->value === null) {
            $this->value = random_bytes($length);
        }

        return $this->value;
    }
}

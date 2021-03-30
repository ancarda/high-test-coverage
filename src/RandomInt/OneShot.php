<?php

declare(strict_types=1);

namespace Ancarda\HighTestCoverage\RandomInt;

/**
 * Generates a single random number forever
 *
 * OneShot generates a single real random number, then returns that -- and
 * always that -- forever.
 *
 * This is intended to be used when you need uniformity across a test run, but
 * can have or want randomness between test runs.
 */
final class OneShot implements RandomInt
{
    /** @var int|null */
    private $value = null;

    public function __invoke(int $min, int $max): int
    {
        if ($this->value === null) {
            $this->value = random_int($min, $max);
        }

        return $this->value;
    }
}

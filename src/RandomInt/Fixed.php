<?php

declare(strict_types=1);

namespace Ancarda\HighTestCoverage\RandomInt;

/**
 * Return a predetermined fixed value every time
 *
 * This is the simplest possible implementation of RandomInt.
 * The value given in the constructor is returned from invoke every time.
 */
final class Fixed implements RandomInt
{
    /** @var int */
    private $value;

    public function __construct(int $value)
    {
        $this->value = $value;
    }

    public function __invoke(int $min, int $max): int
    {
        return $this->value;
    }
}

<?php

declare(strict_types=1);

namespace Ancarda\HighTestCoverage\RandomBytes;

/**
 * Return a predetermined fixed value every time
 *
 * This is the simplest possible implementation of RandomBytes.
 * The value given in the constructor is returned from invoke every time.
 */
final class Fixed implements RandomBytes
{
    /** @var string */
    private $value;

    public function __construct(string $value)
    {
        $this->value = $value;
    }

    public function __invoke(int $length): string
    {
        return $this->value;
    }
}

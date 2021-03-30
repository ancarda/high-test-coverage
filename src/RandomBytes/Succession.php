<?php

declare(strict_types=1);

namespace Ancarda\HighTestCoverage\RandomBytes;

use LogicException;

/**
 * Return the next item in a set of predetermined fixed values every time
 *
 * This implementation takes a list of strings in the constructor. Each time
 * a random string is requested, the next item in the list is returned and
 * the pointer is moved one place.
 *
 * When the list is exhausted, the pointer wraps around.
 */
final class Succession implements RandomBytes
{
    /** @var array<int, string> */
    private $succession = [];

    /** @var int */
    private $cursor = 0;

    /** @var int */
    private $last = 0;

    /**
     * @param array<int, string> $succession Non-Empty array
     * @throws LogicException If given an empty array
     */
    public function __construct(array $succession)
    {
        if (count($succession) === 0) {
            throw new LogicException('succession cannot be empty');
        }

        $this->last = count($succession) - 1;
        $this->succession = $succession;
    }

    public function __invoke(int $length): string
    {
        if ($this->cursor === $this->last) {
            $this->cursor = 0;
            return $this->succession[$this->last];
        }

        return $this->succession[$this->cursor++];
    }

    public function rewind(): void
    {
        $this->cursor = 0;
    }
}

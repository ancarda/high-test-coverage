<?php

declare(strict_types=1);

namespace Ancarda\HighTestCoverage\RandomInt;

/**
 * Dispatch to a user function.
 *
 * This implementation calls the function given to the constructor every time
 * a random number is requested. The user function is given the arguments
 * provided to randomInt. This class is intended to be used when you need
 * arbitary or complex logic, but don't want to mock the RandomInt interface.
 *
 * Please note that there are many implementations of RandomInt including
 * Succession and OneShot that may implement the logic you are looking for.
 */
final class Callback implements RandomInt
{
    /** @var callable */
    private $cb;

    public function __construct(callable $cb)
    {
        $this->cb = $cb;
    }

    public function __invoke(int $min, int $max): int
    {
        return call_user_func($this->cb, $min, $max);
    }
}

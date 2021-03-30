<?php

declare(strict_types=1);

namespace Ancarda\HighTestCoverage\RandomBytes;

/**
 * Dispatch to a user function.
 *
 * This implementation calls the function given to the constructor every time
 * random bytes are requested. The user function is given the arguments
 * provided to randomBytes. This class is intended to be used when you need
 * arbitary or complex logic, but don't want to mock the RandomBytes interface.
 *
 * Please note that there are many implementations of RandomBytes including
 * Succession and OneShot that may implement the logic you are looking for.
 */
final class Callback implements RandomBytes
{
    /** @var callable */
    private $cb;

    public function __construct(callable $cb)
    {
        $this->cb = $cb;
    }

    public function __invoke(int $length): string
    {
        return call_user_func($this->cb, $length);
    }
}

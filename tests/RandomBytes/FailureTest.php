<?php

declare(strict_types=1);

namespace Tests\RandomBytes;

use Ancarda\HighTestCoverage\RandomBytes\Failure;
use PHPUnit\Framework\TestCase;
use RuntimeException;

final class FailureTest extends TestCase
{
    public function testThrowsException(): void
    {
        $failure = new Failure();

        $this->expectException(RuntimeException::class);

        $failure(6);
    }
}

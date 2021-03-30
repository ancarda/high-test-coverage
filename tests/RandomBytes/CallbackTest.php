<?php

declare(strict_types=1);

namespace Tests\RandomBytes;

use Ancarda\HighTestCoverage\RandomBytes\Callback;
use PHPUnit\Framework\TestCase;

final class CallbackTest extends TestCase
{
    public function testCallback(): void
    {
        $map = new Callback(function (int $code): string {
            if ($code === 1) {
                return 'Yes';
            }

            return 'No';
        });

        self::assertSame('Yes', $map(1));
        self::assertSame('No', $map(2));
    }
}

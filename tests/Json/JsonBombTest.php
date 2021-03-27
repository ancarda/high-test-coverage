<?php

declare(strict_types=1);

namespace Tests\Json;

use Ancarda\HighTestCoverage\Json\JsonBomb;
use JsonException;
use PHPUnit\Framework\TestCase;

final class JsonBombTest extends TestCase
{
    public function testWillBlowUpJsonEncode(): void
    {
        $bomb = new JsonBomb();

        $this->expectException(JsonException::class);

        json_encode($bomb, JSON_THROW_ON_ERROR);
    }
}

<?php

declare(strict_types=1);

namespace Ancarda\HighTestCoverage\Json;

use JsonSerializable;

/**
 * A class that will cause json_encode to fail
 *
 * This class is intended to be used in tests that cover Json encoding error
 * handling. It does this by returning a resource, which are not possible to
 * Json encode.
 */
final class JsonBomb implements JsonSerializable
{
    public function jsonSerialize()
    {
        return fopen('php://memory', 'w');
    }
}

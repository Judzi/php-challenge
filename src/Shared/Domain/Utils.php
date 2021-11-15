<?php

namespace App\Shared\Domain;

use JsonException;

class Utils
{
    /**
     * @throws JsonException
     */
    public static function toJson(array $data): string
    {
        return \json_encode($data, JSON_FORCE_OBJECT | JSON_THROW_ON_ERROR);
    }
}

<?php

namespace App\Shared\Infrastructure;

class FileWriter
{
    public function write(string $content, string $file)
    {
        \file_put_contents($file, $content);
    }

    public function read(string $file): ?string
    {
        return \file_get_contents($file) ?: null;
    }
}

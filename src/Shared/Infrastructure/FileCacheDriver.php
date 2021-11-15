<?php

namespace App\Shared\Infrastructure;

use App\Shared\Domain\Cache\ICacheDriver;

class FileCacheDriver implements ICacheDriver
{
    private const FILE_PATH = '/var/cache/';

    /**
     * @var FileWriter
     */
    private $writer;

    public function __construct(FileWriter $writer)
    {
        $this->writer = $writer;
    }

    /**
     * {@inheritDoc}
     */
    public function get($key)
    {
        $this->writer->read(self::FILE_PATH . $key);
    }

    /**
     * {@inheritDoc}
     */
    public function set($key, $value)
    {
        $this->writer->write(self::FILE_PATH . $key, $value);
    }
}

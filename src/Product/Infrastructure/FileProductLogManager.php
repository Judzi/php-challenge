<?php

namespace App\Product\Infrastructure;

use App\Product\Domain\Manager\IProductLogManager;
use App\Product\Domain\ProductLog;
use App\Shared\Infrastructure\FileWriter;

class FileProductLogManager implements IProductLogManager
{
    private const FILE_PATH = '/data/product/count/';

    /**
     * @var FileWriter
     */
    private $fileWriter;

    public function __construct(FileWriter $fileWriter)
    {
        $this->fileWriter = $fileWriter;
    }

    public function save(ProductLog $productLog): void
    {
        $filePath = \sprintf('%/%s.txt', self::FILE_PATH, $productLog->getId()->value());
        $count = 1;

        $countFromFile = $this->fileWriter->read($filePath);

        if ($countFromFile) {
            $count += (int) $countFromFile + $count;
        }

        $this->fileWriter->write($count, $filePath);
    }
}

<?php

namespace App\Product\Domain;

use App\Product\Domain\ValueObject\ProductLogCount;
use App\Product\Domain\ValueObject\ProductLogId;

class ProductLog
{
    /**
     * @var ProductLogId
     */
    private $id;

    /**
     * @var ProductLogCount
     */
    private $count;

    public function __construct(ProductLogId $id, ?ProductLogCount $count = null)
    {
        $this->id = $id;
        $this->count = $count;
    }

    public static function createFromProductDetail(string $id): ProductLog
    {
        return new self(new ProductLogId($id));
    }

    public function getId(): ProductLogId
    {
        return $this->id;
    }

    public function getCount(): ProductLogCount
    {
        return $this->count;
    }
}

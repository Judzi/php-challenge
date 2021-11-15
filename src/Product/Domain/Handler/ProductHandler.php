<?php

namespace App\Product\Domain\Handler;

use App\Product\Domain\Manager\IProductLogManager;
use App\Product\Domain\ProductLog;
use App\Product\Infrastructure\ProductManager;
use App\Shared\Domain\Cache\ICacheDriver;

class ProductHandler
{
    private const CACHE_KEY_PREFIX = 'product_';

    /**
     * @var ProductManager
     */
    private $productManager;

    /**
     * @var IProductLogManager
     */
    private $productLogManager;

    /**
     * @var ICacheDriver
     */
    private $cacheDriver;

    public function __construct(
        ProductManager $productManager,
        ICacheDriver $cacheDriver,
        IProductLogManager $productLogManager
    )  {
        $this->productManager = $productManager;
        $this->productLogManager = $productLogManager;
        $this->cacheDriver = $cacheDriver;
    }

    public function getDetail(string $id): array
    {
        $cacheKey = self::CACHE_KEY_PREFIX . $id;
        $cacheData = $this->cacheDriver->get($cacheKey);

        if ($cacheData) {
            return $cacheData;
        }

        $data = $this->productManager->getProduct($id);
        $this->cacheDriver->set($cacheKey, $data);

        $this->productLogManager->save(ProductLog::createFromProductDetail($id));

        return $data;
    }
}

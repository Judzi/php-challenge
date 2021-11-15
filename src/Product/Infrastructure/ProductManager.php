<?php

namespace App\Product\Infrastructure;

use App\Product\Domain\Driver\IElasticSearchDriver;
use App\Product\Domain\Driver\IMySQLDriver;
use App\Product\Domain\Manager\IProductManager;

class ProductManager implements IProductManager
{
    /**
     * @var IElasticSearchDriver
     */
    private $elasticSearchDriver;

    /**
     * @var IMySQLDriver
     */
    private $mysqlDriver;

    /**
     * @var string
     */
    private $defaultSource;

    public function __construct(IElasticSearchDriver $elasticSearchDriver, IMySQLDriver $mysqlDriver, string $defaultSource)
    {
        $this->elasticSearchDriver = $elasticSearchDriver;
        $this->mysqlDriver = $mysqlDriver;
        $this->defaultSource = $defaultSource;
    }

    public function getProduct(string $id): array
    {
        if ($this->defaultSource === IMySQLDriver::class) {
            return $this->mysqlDriver->findProduct($id);
        }

        return $this->elasticSearchDriver->findById($id);
    }
}

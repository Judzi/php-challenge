<?php

namespace App\Product\Domain\Manager;

use App\Product\Domain\ProductLog;

interface IProductLogManager
{
    public function save(ProductLog $productLog);
}

<?php

namespace App\Product\Domain\Manager;

interface IProductManager
{
    public function getProduct(string $id): array;
}

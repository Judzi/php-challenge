<?php

namespace App\Product\Domain\Driver;

interface IElasticSearchDriver
{
    /**
     * @param string $id
     * @return array
     */
    public function findById($id);
}

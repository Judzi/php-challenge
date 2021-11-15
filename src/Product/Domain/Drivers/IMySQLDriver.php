<?php

namespace App\Product\Domain\Driver;

interface IMySQLDriver
{
    /**
     * @param string $id
     * @return array
     */
    public function findProduct($id);
}

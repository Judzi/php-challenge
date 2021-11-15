<?php

namespace WebApp\Controller\Product;

use App\Product\Domain\Handler\ProductHandler;
use App\Shared\Domain\Utils;
use JsonException;

class ProductGetController
{
    /**
     * @var ProductHandler
     */
    private $handler;

    public function __construct(ProductHandler $handler)
    {
        $this->handler = $handler;
    }

    /**
     * @throws JsonException
     */
    public function detail(string $id): string
    {
        return Utils::toJson($this->handler->getDetail($id));
    }
}

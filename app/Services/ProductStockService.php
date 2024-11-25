<?php
namespace App\Services;

use App\Models\ProductStock;

class ProductStockService extends BaseService
{
    public function __construct() {
        parent::__construct(new ProductStock());
    }
}
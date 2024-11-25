<?php
namespace App\Services;

use App\Models\OrderStatus;

class OrderStatusService extends BaseService
{
    public function __construct(){
        parent::__construct(new OrderStatus());
    }
}
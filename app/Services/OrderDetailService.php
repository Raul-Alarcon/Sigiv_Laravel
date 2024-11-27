<?php
namespace App\Services;

use App\Models\OrderDetail;

class OrderDetailService extends BaseService
{
    public function __construct(){
        parent::__construct(new OrderDetail());
    }
}
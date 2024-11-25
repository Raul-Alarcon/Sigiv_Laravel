<?php

namespace App\Services;

use App\Models\Purchasestatus;

class PurchaseStatusService extends BaseService
{
    public function __construct() {
        parent::__construct(new Purchasestatus());
    }
}

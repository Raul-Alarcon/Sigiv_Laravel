<?php

namespace App\Services;

use App\Models\Charge;

class ChargeService extends BaseService
{
    public function __construct() {
        parent::__construct(new Charge());
    }
}

<?php

namespace App\Services;

use App\Models\Productstatus;

class ProductStatusService extends BaseService
{
    public function __construct() {
        parent::__construct(new Productstatus());
    }

}

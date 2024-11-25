<?php

namespace App\Services;

use App\Models\Gender;

class GenderService extends BaseService
{
    public function __construct() {
        parent::__construct(new Gender());
    }
}

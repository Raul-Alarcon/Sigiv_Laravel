<?php

namespace App\Services;

use App\Models\SocialMedia;

class SocialMediaService extends BaseService
{
    public function __construct() {
        parent::__construct(new SocialMedia());
    }
}

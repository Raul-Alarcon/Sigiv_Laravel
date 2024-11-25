<?php

namespace App\Services;

use App\Models\Category;
use Illuminate\Validation\Rules\In;

class CategoryService extends BaseService
{
    public function __construct()
    { 
        parent::__construct( new Category());
    }
}

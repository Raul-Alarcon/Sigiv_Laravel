<?php 
namespace App\Services;

use App\Models\StoreBranch;

class StoreBranchService extends BaseService
{
    public function __construct() {
        parent::__construct(new StoreBranch());
    }
}
<?php
namespace App\Services;

use App\Models\Customer;

class CustomerService extends BaseService
{
    public function __construct(){
        parent::__construct(new Customer());
    }
}
<?php
namespace App\Services;

use App\Models\Employee;

class EmployeeService extends BaseService
{
    public function __construct() {
        parent::__construct(new Employee());
    }
}
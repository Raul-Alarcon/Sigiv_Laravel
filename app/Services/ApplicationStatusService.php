<?php
namespace App\Services;

use App\Models\ApplicationStatus;

class ApplicationStatusService extends BaseService{
    public function __construct(ApplicationStatus $model){
        parent::__construct($model);
    }
}
<?php

namespace App\Services;

use App\Models\Company;

class CompanyService extends BaseService
{
    public function __construct() {
        parent::__construct(new Company());
    }


    public function getAll($paginate, $search = null, $fields = [], $orderBy = 'id', $order = 'ASC')
    { 
        $companies = $this->model->with('sector');

        if ($search) {
            $companies->where(function ($q) use ($search, $fields) {
                foreach ($fields as $field) {
                    $q->orWhere($field, 'like', '%' . $search . '%');
                }
            });
        }

        $paginatedCompanies = $companies->orderBy($orderBy, $order)->paginate($paginate);
 
        $paginatedCompanies->getCollection()->transform(function ($company) { 
 
            $company->sector_name = $company->sector ? $company->sector->name : null; 
            // unset($company->sector_id); 
            unset($company->sector); 
            return $company;
        });

        return $paginatedCompanies;
    }
}

<?php
namespace App\Services;

use App\Models\Customer;
use Carbon\Carbon;

class CustomerService extends BaseService
{
    public function __construct(){
        parent::__construct(new Customer());
    } 


    public function getAll($paginate, $search = null, $fields = [], $orderBy = 'id', $order = 'ASC')
    {
        $customerQuery = $this->model->with(['gender']);

        if ($search && !empty($fields)) {
            $customerQuery->where(function ($q) use ($search, $fields) {
                foreach ($fields as $field) {
                    $q->orWhere($field, 'like', '%' . $search . '%');
                }
            });
        }

        $paginatedCustomers = $customerQuery->orderBy($orderBy, $order)->paginate($paginate);

        $paginatedCustomers->getCollection()->transform(function ($customer) { 
            $customer->gender_name = $customer->gender->name;  
            unset($customer->gender);  
            return $customer;
        });

        return $paginatedCustomers;
    }

    public function update($data, $id)
    {
        $customer = $this->model->find($id);

        if ($customer) {
            $customer->update($data);
        }
        
        return $customer;
    }

    public static function parseCustomerResponse($customer) {
        $customer->gender_name = $customer->gender->name;  
        unset($customer->gender);  
        return $customer;
    }

    public function parseDateResponse($data){
        $data['birth_date'] = Carbon::parse($data['birth_date'])->format('Y-m-d');
        return $data;
    }

}
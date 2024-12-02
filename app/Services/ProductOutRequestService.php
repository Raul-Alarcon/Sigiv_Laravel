<?php

namespace App\Services;

use App\Models\ProductOutRequest;

class ProductOutRequestService extends BaseService
{
    public function __construct() {
        parent::__construct(new ProductOutRequest());
    }

    public function getAll($paginate, $search = null, $fields = [], $orderBy = 'id', $order = 'ASC')
    {
        $outProducts = $this->model->with(['product', 'user', 'userAuth','status']);

        if ($search && !empty($fields)) {
            $outProducts->where(function ($q) use ($search, $fields) {
                foreach ($fields as $field) {
                    $q->orWhere($field, 'like', '%' . $search . '%');
                }
            });
        }

        $paginatedUser = $outProducts->orderBy($orderBy, $order)->paginate($paginate);

        $paginatedUser->getCollection()->transform(function ($out) {
            $out->user_name = $out->user->name;
            $out->product_name = $out->product->name;
            $out->status_name = $out->status->name;

            if($out->userAuth){
                $out->user_auth_name = $out->userAuth->name;
                unset($out->userAuth);
            }


            unset($out->user);
            unset($out->product);
            unset($out->status);

            return $out;
        });

        return $paginatedUser;
    }

    public function parseResponce($out) {
        $out->user_name = $out->user->name;
        $out->product_name = $out->product->name;
        $out->status_name = $out->status->name;

        if($out->userAuth){
            $out->user_auth_name = $out->userAuth->name;
            unset($out->userAuth);
        }


        unset($out->user);
        unset($out->product);
        unset($out->status);

        return $out;
    }


    public function updateProductStatus($idProductStatus, $id)
    {
        $product = ProductOutRequest::find($id);
        if ($product) {
            $product->status_id = $idProductStatus;
            $product->save();
            $product->refresh();
        }
        return $product;
    }
}

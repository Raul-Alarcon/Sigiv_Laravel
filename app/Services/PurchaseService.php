<?php

namespace App\Services;

use App\Models\Purchase;

class PurchaseService extends BaseService
{
    public function __construct()
    {
        parent::__construct(new Purchase());
    }

    public function getAll($paginate, $search = null, $fields = [], $orderBy = 'id', $order = 'ASC')
    {
        $purchases = $this->model->with(['user', 'supplier', 'purchaseStatus']);

        if ($search && !empty($fields)) {
            $purchases->where(function ($q) use ($search, $fields) {
                foreach ($fields as $field) {
                    $q->orWhere($field, 'like', '%' . $search . '%');
                }
            });
        }

        $paginatedPurchase = $purchases->orderBy($orderBy, $order)->paginate($paginate);

        $paginatedPurchase->getCollection()->transform(function ($purchase) {
            $purchase->user_name = $purchase->user->name;
            $purchase->supplier_name = $purchase->supplier->name;
            $purchase->purchaseStatus_name = $purchase->purchaseStatus->name;

            unset($purchase->user);
            unset($purchase->supplier);
            unset($purchase->purchaseStatus);

            return $purchase;
        });

        return $paginatedPurchase;
    }

    public function parseResponce($purchase)
    {

        $purchase->user_name = $purchase->user->name;
        $purchase->supplier_name = $purchase->supplier->name;
        $purchase->purchaseStatus_name = $purchase->purchaseStatus->name;

        unset($purchase->user);
        unset($purchase->supplier);
        unset($purchase->purchaseStatus);

        return $purchase;
    }

    public function generateInvoiceNumber()
    {
        $prefix = 'INV-'; 
        $datePart = date('Ymd'); 
        $randomPart = str_pad(mt_rand(1, 99999), 5, '0', STR_PAD_LEFT);
        $invoiceNumber = $prefix . $datePart . '-' . $randomPart;

        return $invoiceNumber;
    }
}

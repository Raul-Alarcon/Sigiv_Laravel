<?php
namespace App\Services;

use App\Models\Product;

class ProductService extends BaseService
{
    public function __construct(){
        parent::__construct(new Product());
    } 

    public function getAll($paginate, $search = null, $fields = [], $orderBy = 'id', $order = 'ASC')
    {
 
        $products = $this->model->with(['productStatus', 'productStock']);

        if ($search) {
            $products->where(function ($q) use ($search, $fields) {
                foreach ($fields as $field) {
                    $q->orWhere($field, 'like', '%' . $search . '%');
                }
            });
        }

        $paginatedProducts = $products->orderBy($orderBy, $order)->paginate($paginate); 
        $paginatedProducts->getCollection()->transform(function ($product) {  
            return [
                'name' => $product->name,
                'description' => $product->description,
                'unit_price' => $product->unit_price,
                'category_id' => $product->category_id,
                'barcode' => $product->barcode,
                'stock' => $product->productStock->current_stock ?? 0,
                'minimun_stock' => $product->productStock->minimum_stock ?? 3,
                'productstatus_id' => $product->productstatus_id,
                'supplier_id' => $product->supplier_id,
            ];
        });

        return $paginatedProducts;
    }

        
        

}
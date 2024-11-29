<?php
namespace App\Services;

use App\Models\Product;
use App\Models\Productstatus;
use App\Models\ProductStock;

class ProductService extends BaseService
{
    public function __construct(){
        parent::__construct(new Product());
    } 
 
        
    public function getAll($paginate, $search = null, $fields = [], $orderBy = 'id', $order = 'ASC')
    {
        $products = $this->model->with(['stock.storeBranch', 'supplier', 'productStatus', 'category']);

        if ($search && !empty($fields)) {
            $products->where(function ($q) use ($search, $fields) {
                foreach ($fields as $field) {
                    $q->orWhere($field, 'like', '%' . $search . '%');
                }
            });
        }

        $paginatedProducts = $products->orderBy($orderBy, $order)->paginate($paginate);

        $paginatedProducts->getCollection()->transform(function ($product) {
            $product->storeBrancheName = $product->stock->storeBranch->name;
            $product->storebranch_id = $product->stock->storeBranch->id;
            $product->current_stock = $product->stock->current_stock;
            $product->category_name = $product->category->name;
            $product->product_status = $product->productStatus->name;
            $product->supplier_name = $product->supplier->name;

            unset($product->stock);
            unset($product->category);
            unset($product->productStatus);
            unset($product->supplier);

            return $product;
        });

        return $paginatedProducts;
    } 

    public function create($request)
    {
        $productStatus = Productstatus::where('name', 'Activo')->first();

            if ($productStatus === null) {
                return response()->json(['message' => 'Product status not found'], 404);
            }

            // Validar los datos recibidos del request para evitar errores de inserción
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'unit_price' => 'required|numeric|min:0',
                'category_id' => 'required|integer',
                'barcode' => 'nullable|string',
                'supplier_id' => 'required|integer',
                'current_stock' => 'required|integer|min:0',
                'minimun_stock' => 'required|integer|min:0',
                'storebranch_id' => 'required|integer',
            ]);

            // Crear el producto
            $product = Product::create([
                'name' => $validatedData['name'],
                'description' => $validatedData['description'],
                'unit_price' => $validatedData['unit_price'],
                'category_id' => $validatedData['category_id'],
                'barcode' => $validatedData['barcode'],
                'productstatus_id' => $productStatus->id,
                'supplier_id' => $validatedData['supplier_id'],
            ]);
 
            ProductStock::create([
                'current_stock' => $validatedData['current_stock'],
                'minimum_stock' => $validatedData['minimun_stock'],
                'store_branches_id' => $validatedData['storebranch_id'],
                'products_id' => $product->id,
            ]);

            $product->load(['stock.storeBranch', 'supplier', 'productStatus', 'category']);

            $product->storeBrancheName = $product->stock->storeBranch->name;
            $product->storebranch_id = $product->stock->storeBranch->id;
            $product->current_stock = $product->stock->current_stock;
            $product->category_name = $product->category->name;
            $product->product_status = $product->productStatus->name;
            $product->supplier_name = $product->supplier->name;

            unset($product->stock);
            unset($product->category);
            unset($product->productStatus);
            unset($product->supplier);


        return $product;
    }

    public function update($request, $id)
    {
        $product = Product::find($id);

        if ($product) {
            $product->load(['stock.storeBranch', 'supplier', 'productStatus', 'category']);
            $validatedData = $request->validate([
                'name' => 'required|string|max:255',
                'description' => 'nullable|string',
                'unit_price' => 'required|numeric|min:0',
                'category_id' => 'required|integer',
                'barcode' => 'nullable|string',
                'supplier_id' => 'required|integer',
                'current_stock' => 'required|integer|min:0',
                'minimun_stock' => 'required|integer|min:0',
                'storebranch_id' => 'required|integer',
                'productstatus_id' => 'required|integer',
            ]);

            $product->update([
                'name' => $validatedData['name'],
                'description' => $validatedData['description'],
                'unit_price' => $validatedData['unit_price'],
                'category_id' => $validatedData['category_id'],
                'barcode' => $validatedData['barcode'],
                'productstatus_id' =>  $validatedData['productstatus_id'],
                'supplier_id' => $validatedData['supplier_id'],
            ]);

            $product->stock->update([
                'current_stock' => $validatedData['current_stock'],
                'minimum_stock' => $validatedData['minimun_stock'],
                'store_branches_id' => $validatedData['storebranch_id'],
            ]);
 

            $product->storeBrancheName = $product->stock->storeBranch->name;
            $product->storebranch_id = $product->stock->storeBranch->id;
            $product->current_stock = $product->stock->current_stock;
            $product->category_name = $product->category->name;
            $product->product_status = $product->productStatus->name;
            $product->supplier_name = $product->supplier->name;

            unset($product->stock);
            unset($product->category);
            unset($product->productStatus);
            unset($product->supplier);

            return $product;
        }
    }

    public function destroy($id)
    {
        $product = Product::find($id);  
        if ($product) { 
            $product->delete(); 
        } 
    }


}
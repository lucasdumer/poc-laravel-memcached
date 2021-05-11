<?php

namespace App\Repositories;

use App\Requests\ProductCreateRequest;
use App\Requests\ProductListRequest;
use App\Models\Product;
use Illuminate\Support\Facades\DB;

class ProductRepository
{
    public function create(ProductCreateRequest $request): Product
    {
        try {
            $product = new Product();
            $product->name = $request->name;
            $product->price = $request->price;
            $product->save();
            return $product;
        } catch(\Exception $e) {
            throw new \Exception("Database error on creating product. ".$e->getMessage());
        }
    }

    public function find(int $id): ?Product
    {
        try {
            $product = Product::find($id);
            return $product;
        } catch(\Exception $e) {
            throw new \Exception("Database error on find product. ".$e->getMessage());
        }
    }

    public function list(ProductListRequest $request)
    {
        try {
            $product = DB::table('product');
            if (!empty($request->name)) {
                $product->where('name', 'like', '%'.$request->name.'%');
            }
            return $product->get();
        } catch(\Exception $e) {
            throw new \Exception("Database error on list product. ".$e->getMessage());
        }
    }

    public function delete(int $id): void
    {
        try {
            $product = Product::find($id);
            if (empty($product)) {
                throw new \Exception("No find with id.");
            }
            $product->delete();
        } catch(\Exception $e) {
            throw new \Exception("Database error on delete product. ".$e->getMessage());
        }
    }
}

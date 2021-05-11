<?php

namespace App\Services;

use App\Requests\ProductCreateRequest;
use App\Requests\ProductFindRequest;
use App\Requests\ProductListRequest;
use App\Requests\ProductDeleteRequest;
use App\Repositories\ProductRepository;
use App\Models\Product;

class ProductService
{
    private $productRepository;

    public function __construct(ProductRepository $productRepository) {
        $this->productRepository = $productRepository;
    }

    public function create(ProductCreateRequest $request): Product
    {
        try {
            $product = $this->productRepository->create($request);
            return $product;
        } catch(\Exception $e) {
            throw new \Exception("Error on creating product. ".$e->getMessage());
        }
    }

    public function find(ProductFindRequest $request): ?Product
    {
        try {
            return $this->productRepository->find((int) $request->id);
        } catch(\Exception $e) {
            throw new \Exception("Error on find product. ".$e->getMessage());
        }
    }

    public function list(ProductListRequest $request)
    {
        try {
            $products = $this->productRepository->list($request);
            return $products;
        } catch(\Exception $e) {
            throw new \Exception("Error on list product. ".$e->getMessage());
        }
    }

    public function delete(ProductDeleteRequest $request): void
    {
        try {
            $this->productRepository->delete((int) $request->id);
        } catch(\Exception $e) {
            throw new \Exception("Error on delete product. ".$e->getMessage());
        }
    }
}

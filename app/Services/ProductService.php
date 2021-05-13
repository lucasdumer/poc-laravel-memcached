<?php

namespace App\Services;

use App\Requests\ProductCreateRequest;
use App\Requests\ProductFindRequest;
use App\Requests\ProductListRequest;
use App\Requests\ProductDeleteRequest;
use App\Requests\ProductUpdateRequest;
use App\Repositories\ProductRepository;
use App\Models\Product;
use App\Services\CacheService;

class ProductService
{
    private $productRepository;

    public function __construct(ProductRepository $productRepository, CacheService $cacheService) {
        $this->productRepository = $productRepository;
        $this->cacheService = $cacheService;
    }

    public function create(ProductCreateRequest $request): Product
    {
        try {
            $product = $this->productRepository->create($request);
            $this->cacheService->clear('products');
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
            $products = $this->cacheService->get('products');
            if (!empty($products)) {
                return $products;
            }
            $products = $this->productRepository->list($request);
            $this->cacheService->set('products', $products);
            return $products;
        } catch(\Exception $e) {
            throw new \Exception("Error on list product. ".$e->getMessage());
        }
    }

    public function delete(ProductDeleteRequest $request): void
    {
        try {
            $this->productRepository->delete((int) $request->id);
            $this->cacheService->clear('products');
        } catch(\Exception $e) {
            throw new \Exception("Error on delete product. ".$e->getMessage());
        }
    }

    public function update(ProductUpdateRequest $request): Product
    {
        try {
            $product = $this->productRepository->update($request);
            $this->cacheService->clear('products');
            return $product;
        } catch(\Exception $e) {
            throw new \Exception("Error on update product. ".$e->getMessage());
        }
    }

}

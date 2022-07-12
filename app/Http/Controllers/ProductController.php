<?php

namespace App\Http\Controllers;

use App\Requests\ProductCreateRequest;
use App\Requests\ProductFindRequest;
use App\Requests\ProductListRequest;
use App\Requests\ProductDeleteRequest;
use App\Requests\ProductUpdateRequest;
use App\Services\ProductService;

class ProductController extends Controller
{
    public function __construct(private ProductService $productService) {}

    public function create(ProductCreateRequest $request)
    {
        return $this->success($this->productService->create($request));
    }

    public function find(ProductFindRequest $request)
    {
        return $this->success($this->productService->find($request));
    }

    public function list(ProductListRequest $request)
    {
        return $this->success($this->productService->list($request));
    }

    public function delete(ProductDeleteRequest $request)
    {
        $this->productService->delete($request);
        return $this->success();
    }

    public function update(ProductUpdateRequest $request)
    {
        return $this->success($this->productService->update($request));
    }
}

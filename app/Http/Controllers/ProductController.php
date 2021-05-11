<?php

namespace App\Http\Controllers;

use App\Requests\ProductCreateRequest;
use App\Requests\ProductFindRequest;
use App\Requests\ProductListRequest;
use App\Services\ProductService;

class ProductController extends Controller
{
    private $productService;

    public function __construct(ProductService $productService)
    {
        $this->productService = $productService;
    }

    public function create(ProductCreateRequest $request)
    {
        try {
            $author = $this->productService->create($request);
            return $this->success($author);
        } catch(\Exception $e) {
            return $this->error($e);
        }
    }

    public function find(ProductFindRequest $request)
    {
        try {
            $product = $this->productService->find($request);
            return $this->success($product);
        } catch(\Exception $e) {
            return $this->error($e);
        }
    }

    public function list(ProductListRequest $request)
    {
        try {
            $products = $this->productService->list($request);
            return $this->success($products);
        } catch(\Exception $e) {
            return $this->error($e);
        }
    }

    // public function delete(AuthorDeleteRequest $request)
    // {
    //     try {
    //         $this->authorService->delete($request);
    //         return $this->success();
    //     } catch(\Exception $e) {
    //         return $this->error($e);
    //     }
    // }
}
